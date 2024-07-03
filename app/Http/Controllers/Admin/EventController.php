<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    protected $imageFields = [
        ['image' => 'image_event', 'description' => 'description_event']
    ];
    public function CreateEvent()
    {
        return view('admin.EventManager.CreateEvent');
    }
    public function store(Request $request)
    {
        $data = $request->only('title_event', 'description_event');
        $data['active_region_id'] = $request->input('active_region_id', 2);
        $data['user_id'] = Auth::id();
        foreach ($this->imageFields as $field) {
            if ($request->hasFile($field['image'])) {
                $data[$field['image']] = $request->file($field['image'])->store('images', 'public');
            }
            $data[$field['description']] = $request->input($field['description']);
        }
        Event::create($data);
        return redirect()->route('EventManager.ShowallEvent')->with('success', 'Dữ liệu được thêm thành công.');
    }
    public function ShowEvent(Event $event)
    {
        return view('admin.EventManager.ShowEventDetail', compact('event'));
    }
    public function ShowallEvent()
    {
        $events = Event::all();
        $events = Event::with('activeRegion')->get();
        return view('admin.EventManager.ShowEvent', compact('events'));
    }
    public function EditEvent(Event $event)
    {
        return view('admin.EventManager.EditEvent', compact('event'));
    }

    public function UpdateEvent(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title_event' => 'required|string|max:255',
            'description_event' => 'required|string',
            'image_event' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active_region_id' => 'nullable|exists:regions,id',
        ]);
        $data = $request->only('title_event', 'description_event');
        $data['active_region_id'] = $request->input('active_region_id', 2);
        $data['user_id'] = Auth::id();
        foreach ($this->imageFields as $field) {
            if ($request->hasFile($field['image'])) {
                if ($event->{$field['image']}) {
                    Storage::disk('public')->delete($event->{$field['image']});
                }
                $data[$field['image']] = $request->file($field['image'])->store('images', 'public');
            }
            $data[$field['description']] = $request->input($field['description']);
        }
        $event->update($data);
        return redirect()->route('EventManager.ShowallEvent')->with('success', 'Cập nhật thành công!... Vui lòng chờ Admin Duyệt');
    }
    public function DestroyEvent(Event $event)
    {
        foreach ($this->imageFields as $field) {
            if ($event->{$field['image']}) {
                Storage::disk('public')->delete($event->{$field['image']});
            }
        }
        $event->delete();
        return redirect()->route('EventManager.ShowallEvent')->with('success', 'Xóa thành công. Vui lòng chờ Admin Duyệt ');
    }
    public function BrowserEvent()
    {
        $events = Event::where('active_region_id','!=', 1)->get();
        return view('admin.EventManager.BrowserEvent', compact('events'));
    }
    public function ApproveEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->active_region_id = 1;
        $event->save();

        return redirect()->route('EventManager.BrowserEvent')->with('success', 'Duyệt bài viết thành công.');
    }
    public function RejectEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->active_region_id = 3;
        $event->save();
        return redirect()->route('EventManager.BrowserEvent')->with('success', 'Từ chối bài viết thành công.');
    }
}
