<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\KeyFeature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KeyFeatureController extends Controller{

    public function key_features(Request $request){
        $keyFeature = KeyFeature::all();
        return view('admin.keyfeature.key_feature',compact('keyFeature'));
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

    public function edit_key_feture($id){
        $featureDetail = KeyFeature::where('id',$id)->first();
        return view('admin.keyfeature.edit_key_feature',compact('featureDetail'));
    }

    public function update_key_feature(Request $request,$id){
        if($request->isMethod('put')){
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'nullable|string',
                'phone'       => 'nullable|string|max:20',
                'iconimage'   => 'nullable|image|mimes:png,jpg,jpeg,svg|max:500',
                'status'      => 'required|in:0,1',
            ]);

            $feature = KeyFeature::findOrFail($id);
            // HERE $data is defined
            $data = $request->only([
                'title',
                'description',
                'phone',
                'status'
            ]);

            // Icon update
            if($request->hasFile('iconimage')){
                // old icon delete
                if ($feature->icon_img && file_exists(public_path($feature->icon_img))) {
                    unlink(public_path($feature->icon_img));
                }
                $file = $request->file('iconimage');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/key_features'), $filename);
                $data['icon_img'] = 'uploads/key_features/'.$filename;
            }
            $feature->update($data);
            return redirect('admin/key-features')->with('success', 'Key Feature updated successfully');
        }
    }
}
