<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\CausesCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CausesController extends Controller{
    
    public function causes_category(){
        $allcat = CausesCategory::all();
        return view('admin.causes.causes_category',compact('allcat'));
    }

    public function add_causes_category(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'cat_name' => 'required|string|max:1000',
                'status' => 'required|in:0,1',
            ]);

            CausesCategory::create([
                'cat_name' => $request->cat_name,
                'slug'     => Str::slug($request->cat_name),
                'status'   => $request->status,
            ]);

            return redirect('admin/causes-category/')->with('success', 'Blog category added successfully!');

        }else{
            $allcat = array();
            return view('admin.causes.add_causes_category',compact('allcat'));
        }
    }

    public function edit_causes_category($id){
        echo $id;
    }
    public function manage_causes(Request $request){
        $keyFeature = array();
        return view('admin.causes.manage_causes',compact('keyFeature'));
    }

    public function add_cause(Request $request){

        if($request->isMethod('post')){
            if($request->validate([
                'title' => 'required',
            ]));
        }else{
            return view('admin.causes.add_causes');
        }
    }
}
