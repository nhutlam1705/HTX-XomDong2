<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    
    private $imageFields = [
        ['image' => 'image_category', 'description' => 'description_category'],
    ];

    public function CreateCategory()
    {
        return view('admin.ProductManager.CategoryProduct.CreateCategory');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_category' => 'required|string|max:255',
            'description_category' => 'required|string',
            'image_category' => 'required|image|max:2048',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);
        $data = $request->only('title_category', 'description_category');

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

        Category::create($data);

        return redirect()->route('CategoryProduct.ShowCategory')->with('success', 'Dữ liệu được thêm thành công.');
    }

    public function ShowCategory()
    {
        $categories = Category::all();
        $categories = Category::with('activeRegion')->get();
        return view('admin.ProductManager.CategoryProduct.ShowCategory', compact('categories'));
    }
    public function EditCategory(Category $category)
    {
        return view('admin.ProductManager.CategoryProduct.EditCategory', compact('category'));
    }

    public function UpdateCategory(Request $request, Category $category)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title_category' => 'required|string|max:255',
            'description_category' => 'required|string',
            'image_category' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);

        // Initialize an array to hold the data to be updated
        $data = $request->only('title_category', 'description_category');
        $data['active_region_id'] = $request->input('active_region_id', 2);

        // Handle image uploads if files are provided
        if ($request->hasFile('image_category')) {
            // Delete old image if it exists
            if ($category->image_category) {
                Storage::disk('public')->delete($category->image_category);
            }
            // Store the new image
            $data['image_category'] = $request->file('image_category')->store('images', 'public');
        }
        $category->active_region_id = $request->active_region_id;
        $category->update($data);
        return redirect()->route('CategoryProduct.ShowCategory')->with('success', 'Cập nhật thành công!... Vui lòng chờ Admin Duyệt');
    }

    public function DestroyCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('CategoryProduct.ShowCategory')->with('success', 'Xóa thành công. Vui lòng chờ Admin Duyệt ');
    }

    public function BrowserCategory()
    {
        $categories = Category::where('active_region_id','!=', 1)->get();
        return view('admin.ProductManager.CategoryProduct.BrowserCategory', compact('categories'));
    }
    public function ApproveCategory($id)
    {
        $category = Category::findOrFail($id);
        // Thay đổi active_region_id thành 1 khi duyệt
        $category->active_region_id = 1;
        $category->save();

        return redirect()->route('CategoryProduct.BrowserCategory')->with('success', 'Duyệt bài viết thành công.');
    }

    public function RejectCategory($id)
    {
        $category = Category::findOrFail($id);
        // Thay đổi active_region_id thành 3 khi từ chối
        $category->active_region_id = 3;
        $category->save();

        return redirect()->route('CategoryProduct.BrowserCategory')->with('success', 'Từ chối bài viết thành công.');
    }
}
