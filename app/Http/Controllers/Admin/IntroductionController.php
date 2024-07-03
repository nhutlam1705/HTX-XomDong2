<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;

class IntroductionController extends Controller
{
    private $imageFields = [
        ['image' => 'image', 'description' => 'description'],
    ];

    public function create()
    {
        return view('admin.introductions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);
        $data = $request->only('title', 'description');

        $data['active_region_id'] = $request->input('active_region_id', 2);
        $data['user_id'] = Auth::id();

        // Process image uploads
        foreach ($this->imageFields as $field) {
            if ($request->hasFile($field['image'])) {
                $data[$field['image']] = $request->file($field['image'])->store('images', 'public');
            }
            // Always set description, even if image isn't present
            $data[$field['description']] = $request->input($field['description']);
        }

        Introduction::create($data);

        return redirect()->route('introductions.showall')->with('success', 'Dữ liệu được thêm thành công.');
    }

    public function show(Introduction $introduction)
    {
        return view('admin.introductions.showdetail', compact('introduction'));
    }

    public function showall()
    {
        $introductions = Introduction::all();
        $introductions = Introduction::with('activeRegion')->get();
        return view('admin.introductions.show', compact('introductions'));
    }
    public function edit(Introduction $introduction)
    {
        return view('admin.introductions.edit', compact('introduction'));
    }

    public function update(Request $request, Introduction $introduction)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);

        // Initialize an array to hold the data to be updated
        $data = $request->only('title', 'description');
        $data['active_region_id'] = $request->input('active_region_id', 2);

        // Handle image uploads if files are provided
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $introduction->active_region_id = $request->active_region_id;
        $introduction->update($data);
        return redirect()->route('introductions.showall')->with('success', 'Cập nhật thành công!... Vui lòng chờ Admin Duyệt');
    }

    public function destroy(Introduction $introduction)
    {
        $introduction->delete();
        return redirect()->route('introductions.showall')->with('success', 'Xóa thành công. Vui lòng chờ Admin Duyệt ');
    }

    public function Browser()
    {
        $introductions = Introduction::where('active_region_id','!=', 1)->get();
        return view('admin.introductions.BrowserIntroduction', compact('introductions'));
    }
    public function approve($id)
    {
        $introduction = Introduction::findOrFail($id);
        // Thay đổi active_region_id thành 1 khi duyệt
        $introduction->active_region_id = 1;
        $introduction->save();

        return redirect()->route('introductions.BrowserIntroduction')->with('success', 'Duyệt bài viết thành công.');
    }

    public function reject($id)
    {
        $introduction = Introduction::findOrFail($id);
        // Thay đổi active_region_id thành 3 khi từ chối
        $introduction->active_region_id = 3;
        $introduction->save();

        return redirect()->route('introductions.BrowserIntroduction')->with('success', 'Từ chối bài viết thành công.');
    }
}
