<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\Admin\EventGallery;
use Illuminate\Http\Request;

class EventGalleryController extends Controller{
    //

    public function manage_event_gallery(Request $request){
        $eventList = array();
        return view('admin.event.manage_event_gallery',compact('eventList'));
    }
    public function add_event_gallery(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'event_id' => 'required|exists:tb_event,id',
                'gallery_img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:500', // validate each file
            ]);

            
        }
        else{
            $allevent = Event::select('id','title')->get();
            return view('admin.event.add_event_gallery_form',compact('allevent'));
        }
        
    }
}
