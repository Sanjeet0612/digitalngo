<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\CausesCategory;
use App\Models\Admin\Causes;
use App\Models\CausesDonation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        $allCauses = Causes::all();
        return view('admin.causes.manage_causes',compact('allCauses'));
    }

    public function add_cause(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'title'         => 'required|string|max:255',
                'description'   => 'nullable|string',
                'banner'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
                'name'          => 'required|string|max:255',
                'phone'         => 'required|string|max:20',
                'email'         => 'required|email',
                'tot_amt'       => 'required|numeric|min:0',
                'start_date'    => 'required|date',
                'end_date'      => 'required|date|after_or_equal:start_date',
                'status'        => 'required|boolean',
            ]);

            /* Banner Upload */
            $bannerPath = null;
            if($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('causes/banners', 'public');
            }

            $slug = Str::slug($request->title);
            $count = Causes::where('slug', 'LIKE', "{$slug}%")->count();
            if($count){
                $slug .= '-' . $count;
            }

            $catidName = explode(',',$request->cat_name);
            $catId = $catidName[0];
            $catName = $catidName[1];

            Causes::create([
                'causes_cat_id'   => $catId,
                'couses_cat_name' => $catName, // optional snapshot
                'title'           => $request->title,
                'slug'            => $slug,
                'description'     => $request->description,
                'banner'          => $bannerPath,
                'name'            => $request->name,
                'phone'           => $request->phone,
                'email'           => $request->email,
                'tot_amt'         => $request->tot_amt,
                'received_amt'    => 0,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'status'          => $request->status,
            ]);

            return redirect()->back()->with('success', 'Cause created successfully');

        }else{
            $category = CausesCategory::all();
            return view('admin.causes.add_causes',compact('category'));
        }
    }
    public function edit_causes($id){
        $category   = CausesCategory::all();
        $causesData = Causes::findOrFail($id);
        return view('admin.causes.edit_causes',compact('category','causesData'));
    }

    public function update_cause(Request $request,$id){
        if($request->isMethod('put')){
            $cause = Causes::findOrFail($id);
            $request->validate([
                'title'         => 'required|string|max:255',
                'description'   => 'required|string',
                'banner'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
                'name'          => 'required|string|max:255',
                'phone'         => 'required|string|max:20',
                'email'         => 'required|email',
                'tot_amt'       => 'required|numeric|min:0',
                'start_date'    => 'required|date',
                'end_date'      => 'required|date|after_or_equal:start_date',
                'status'        => 'required|boolean',
            ]);

            /* Update Slug if title changed */
            if($cause->title !== $request->title) {
                $slug = Str::slug($request->title);
                $count = Causes::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
                $cause->slug = $count ? "{$slug}-{$count}" : $slug;
            }

            /* Banner Update */
            if($request->hasFile('banner')) {
                // delete old banner
                if($cause->banner && Storage::disk('public')->exists($cause->banner)) {
                    Storage::disk('public')->delete($cause->banner);
                }
                $cause->banner = $request->file('banner')->store('causes/banners', 'public');
            }

            $catidName = explode(',',$request->cat_name);
            $catId = $catidName[0];
            $catName = $catidName[1];

            $cause->update([
                'causes_cat_id'   => $catId,
                'couses_cat_name' => $catName,
                'title'           => $request->title,
                'description'     => $request->description,
                'name'            => $request->name,
                'phone'           => $request->phone,
                'email'           => $request->email,
                'tot_amt'         => $request->tot_amt,
                'start_date'      => $request->start_date,
                'end_date'        => $request->end_date,
                'status'          => $request->status,
            ]);

            return redirect('/admin/manage-causes')->with('success', 'Cause updated successfully');

        }else{
            echo "Bad Request!";
        }
    }

    public function delete_causes($id){
        $category = Causes::findOrFail($id);
        $category->delete();
        return redirect('admin/manage-causes/')->with('success', 'Causes deleted successfully!');
    }
    // Causes Donation
    public function causes_donation(Request $request){
        $alldonation = CausesDonation::orderBy('donation_date', 'desc')->get();
        return view('admin.causes.causes_donation',compact('alldonation'));
    }

    public function edit_donation($id){
        $donationDetail = CausesDonation::with('cause:id,title')->where('id', $id)->first();
        return view('admin.causes.edit_donation',compact('donationDetail'));
    }

    public function update_donation(Request $request,$id){
        $donationData = CausesDonation::findOrFail($id);

        try{
            DB::transaction(function () use ($request, $donationData) {
                // Already paid protection
                if($donationData->is_paid == 1 && $request->is_paid == 1) {
                    throw new \Exception('Donation already marked as paid');
                }
                // Update donation table
                $updated = $donationData->update([
                    'is_paid' => $request->is_paid,
                    'status'  => $request->status,
                ]);
                if(!$updated) {
                    throw new \Exception('Failed to update donation record');
                }
                // Update causes table
                if($request->is_paid == 1) {
                    $incremented = Causes::where('id', $donationData->causes_id)->increment('received_amt', $donationData->donation_amt);
                    if(!$incremented) {
                        throw new \Exception('Failed to update causes received amount');
                    }
                }
            });
        }
        catch (\Throwable $e){
            // Transaction auto-rollback ho chuka hoga
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'Donation & Cause updated successfully ✅');
    }
}
