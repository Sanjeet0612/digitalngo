<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TestimonialModel;

class AdminTestimonial extends Controller
{
    public function manage_testimonial(Request $request){
        $testiData = TestimonialModel::all();
        return view('admin.testimonial.manage_testimonial',compact('testiData'));
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
                'designation' => $request->designation,
                'description' => $request->description,
                'profile_img' => $imagePath,
                'status' => $request->status,
            ]);

            return redirect('admin/manage-testimonial')->with('success','Successfully Added!');
        }
    }

    public function delete_testimonial(Request $request,$id){
        $testi = TestimonialModel::findOrFail($id);
        $testi->delete();
        return redirect('admin/manage-testimonial/')->with('success', 'Testimonial deleted successfully!');
    }
}
