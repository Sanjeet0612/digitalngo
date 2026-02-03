<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\GalleryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function picture_category(Request $request){
        $allCategory = GalleryCategory::all(); 
        return view('admin.gallery.manage_picture_category',compact('allCategory'));
    }
    public function add_category(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'cat_name.*' => 'required|string|max:255',
                'gtype.*'    => 'required|in:photo,video',
                'status.*'   => 'required|in:0,1',
            ]);

            foreach($request->cat_name as $key => $catName){
                GalleryCategory::create([
                    'cat_name' => $catName,
                    'gtype'    => $request->gtype,
                    'status'   => $request->status[$key],
                ]);
            }
            return redirect('admin/picture-category')->with('success', 'Successfully Addd!');

        }else{
            return view('admin.gallery.add_category_form');
        }
    }
    public function edit_category(Request $request,$id){
        return view('admin.gallery.edit_category_form');
    }
    public function gallery_picture(Request $request){

    }

    public function gallery_video(Request $request){
        
    }

}
