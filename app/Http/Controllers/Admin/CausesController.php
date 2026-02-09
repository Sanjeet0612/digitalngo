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

            return redirect('admin/causes-category/')->with('success', 'Causes category added successfully!');

        }else{
            return view('admin.causes.add_causes_category');
        }
    }

    public function edit_causes_category($id){
        $causeCatData = CausesCategory::where('id',$id)->first();
        return view('admin.causes.edit_causes_category',compact('causeCatData'));
    }
    public function update_causes_category(Request $request,$id){

        if($request->isMethod('put')){
            $category = CausesCategory::findOrFail($id);
            $request->validate([
                'cat_name' => 'required|string|max:255',
                'status'   => 'required|boolean',
            ]);
            $slug = Str::slug($request->cat_name);

            // handle duplicate slug
            /*$count = CausesCategory::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
            if($count) {
                $slug = $slug . '-' . $count;
            }*/

            $category->update([
                'cat_name' => $request->cat_name,
                'slug'     => $slug,
                'status'   => $request->status,
            ]);

            return redirect('admin/causes-category/')->with('success', 'Causes category Updated successfully!');

        }
    }
    public function delete_causes_category($id){
        $category = CausesCategory::findOrFail($id);
        $category->delete();
        return redirect('admin/causes-category/')->with('success', 'Causes category deleted successfully!');
    }
    // Category End
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
            $category = CausesCategory::all();
            return view('admin.causes.add_causes',compact('category'));
        }
    }
}
