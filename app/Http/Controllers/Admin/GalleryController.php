<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function picture_category(Request $request){
        return view('admin.gallery.manage_category');
    }
    public function gallery_picture(Request $request){

    }

    public function gallery_video(Request $request){
        
    }

}
