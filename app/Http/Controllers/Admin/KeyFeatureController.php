<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\KeyFeature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KeyFeatureController extends Controller{

    public function key_features(Request $request){
        $contact = array();
        return view('admin.keyfeature.key_feature');
    }
    public function add_key_feature(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'phone'       => 'nullable|string|max:20',
                'icon_img'    => 'nullable|image|mimes:png,jpg,jpeg,svg|max:500',
                'status'      => 'required|in:0,1',
            ]);

            $data = $request->only(['title', 'description', 'phone', 'status']);
            $data['slug'] = Str::slug($request->title);

            // Image upload
            if($request->hasFile('iconimage')) {
                $file = $request->file('iconimage');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/key_features'), $filename);
                $data['icon_img'] = 'uploads/key_features/'.$filename;
            }
           
            KeyFeature::create($data);

            return redirect()->back()->with('success', 'Key Feature added successfully');

        }else{
           
            return view('admin.keyfeature.add_feature_form');
        }
    }
}
