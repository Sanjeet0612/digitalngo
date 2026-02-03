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

        }else{
            return view('admin.gallery.add_category_form');
        }
    }
    public function gallery_picture(Request $request){

    }

    public function gallery_video(Request $request){
        
    }

}
