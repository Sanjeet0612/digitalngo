<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTestimonial extends Controller
{
    public function manage_testimonial(Request $request){
        return view('admin.testimonial.manage_testimonial');
    }

    public function add_testimonial(Request $request){

        if($request->isMethod('post')){

            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'profile_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:500',
            ]);
            // image upload (public)
            $imagePath = $request->file('profile_img')->store('admin/testimonial', 'public');

            TestimonialModel::create([
                'name' => $request->name,
                'description' => $request->description,
                'profile_img' => $imagePath,
                'status' => $request->status,
            ]);
        }
    }
}
