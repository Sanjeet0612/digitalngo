<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function picture_category(Request $request){
        $banners = array(); 
        return view('admin.gallery.manage_picture_category',compact('banners'));
    }
    public function add_category(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'gtype'  => 'required|string|max:255',
                'status' => 'required|in:0,1',
            ]);

            $data = [
                'gtype'  => $request->gtype,
                'status' => $request->status,
            ];

            // image upload
            if($request->hasFile('path')) {
                $data['path'] = $request->file('path')
                    ->store('admin/gallery-category', 'public');
            }

        }else{
            return view('admin.gallery.add_category_form');
        }
    }
    public function gallery_picture(Request $request){

    }

    public function gallery_video(Request $request){
        
    }

}
