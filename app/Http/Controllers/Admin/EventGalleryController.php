<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\EventGallery;
use Illuminate\Http\Request;

class EventGalleryController extends Controller{
    //

    public function manage_event_gallery(Request $request){
        $eventGallery = EventGallery::with('event')->get();
        return view('admin.event.manage_event_gallery',compact('eventGallery'));
    }
    public function add_event_gallery(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'event_id' => 'required|exists:tb_event,id',
                'gallery_img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:500', // validate each file
            ]);

            if($request->hasFile('gallery_img')) {
                foreach ($request->file('gallery_img') as $file) {
                    // Get last position for this event
                    $lastPosition = EventGallery::where('event_id', $request->event_id)->max('position'); // returns null if no records
                    $nextPosition = $lastPosition !== null ? $lastPosition + 1 : 1;
                    // Store image
                    $path = $file->store('admin/event_gallery', 'public');
                    // Create DB record
                    EventGallery::create([
                        'event_id' => $request->event_id,
                        'image' => $path,
                        'position' => $nextPosition,  // auto increment per event
                        'status' => $request->status,
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Gallery images uploaded successfully.');
        }
        else{
            $allevent = Event::select('id','title')->get();
            return view('admin.event.add_event_gallery_form',compact('allevent'));
        }
    }
    public function edit_event_gallery($id){
        $allevent    = Event::select('id','title')->get();
        $eventGallDetail = EventGallery::where('id',base64_decode($id))->first();
        return view('admin.event.edit_event_gallery_form',compact('allevent','eventGallDetail'));
    }
    public function update_event_gallery(Request $request,$id){
        $gallery = EventGallery::findOrFail($id);
        
    }
}
