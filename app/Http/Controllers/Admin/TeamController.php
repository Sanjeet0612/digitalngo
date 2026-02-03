<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Management;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function management_team(Request $request){
        $managementList = Management::all();
        return view('admin.team.management_team',compact('managementList'));
    }
    public function add_management_team(Request $request){

        if($request->isMethod('post')){
                // Validation
                $request->validate([
                    'm_name'      => 'required|string|max:255',
                    'designation'  => 'nullable|string|max:100',
                    'emailid'     => 'nullable|email|max:255',
                    'phone'       => 'nullable|string|max:20',
                    'address'     => 'nullable|string|max:500',
                    'city'        => 'nullable|string|max:100',
                    'state'       => 'nullable|string|max:100',
                    'zip_code'    => 'nullable|string|max:20',
                    'fb_link'     => 'nullable|url|max:255',
                    'twt_link'    => 'nullable|url|max:255',
                    'insta_link'  => 'nullable|url|max:255',
                    'description' => 'nullable|string',
                    'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:500',
                ]);

                // Handle profile image
                $path = null;
                if($request->hasFile('profile_img')){
                    $path = $request->file('profile_img')->store('admin/management','public');  // storage/app/public/admin/management
                }

                $slug = Str::slug($request->m_name);
                $count = Management::where('slug', 'LIKE', "$slug%")->count();
                $mslug = $count ? $slug.'-'.$count : $slug;


                // Create DB record
                Management::create([
                    'm_name'      => $request->m_name,
                    'slug'        => $mslug,
                    'designation' => $request->designation,
                    'emailid'     => $request->emailid,
                    'phone'       => $request->phone,
                    'address'     => $request->address,
                    'city'        => $request->city,
                    'state'       => $request->state,
                    'zip_code'    => $request->zip_code,
                    'fb_link'     => $request->fb_link,
                    'twt_link'    => $request->twt_link,
                    'insta_link'  => $request->insta_link,
                    'description' => $request->description,
                    'profile_img' => $path,
                    'status'      => 1,
                ]);
                // Redirect with success message
                return redirect()->back()->with('success', 'Management member added successfully.');
        }
        else{
            return view('admin.team.management_form');
        }
        
    }
    public function edit_management($id){
        $rowid = base64_decode($id);
        $detail = Management::where('id',$rowid)->first();
        return view('admin.team.edit_management_team',compact('detail'));
    }
    public function update_management_team(Request $request,$id){
        
        $request->validate([
            'm_name'      => 'required|string|max:255',
            'emailid'     => 'required|email',
            'phone'       => 'required|string|max:20',
            'description' => 'nullable|string',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
        ]);
        $management = Management::findOrFail($id);

        // Slug generate (agar name change ho)
        $slug  = Str::slug($request->m_name);
        $count = Management::where('slug', 'LIKE', "$slug%")->where('id', '!=', $id)->count();
        $slug  = $count ? $slug.'-'.$count : $slug;

        // 🔹 Data array (all columns)
        $data = [
            'm_name'      => $request->m_name,
            'slug'        => $slug,
            'designation' => $request->designation,
            'emailid'     => $request->emailid,
            'phone'       => $request->phone,
            'address'     => $request->address,
            'city'        => $request->city,
            'state'       => $request->state,
            'zip_code'    => $request->zip_code,
            'fb_link'     => $request->fb_link,
            'twt_link'    => $request->twt_link,
            'insta_link'  => $request->insta_link,
            'description'=> $request->description,
            'status'      => $request->status,
        ];


        // Image update (optional)
        if($request->hasFile('profile_img')){
            // old image delete
            if($management->profile_img && Storage::disk('public')->exists($management->profile_img)) {
                Storage::disk('public')->delete($management->profile_img);
            }
            // new image store
            $data['profile_img'] = $request->file('profile_img')->store('admin/management', 'public');
        }
        $management->update($data);
        return redirect()->route('admin.management_team')->with('success', 'Management record updated successfully');

    }
    // Governing Board Teams
    public function governing_board_teams(Request $request){

    }
    // Volunteers Section
    public function volunteers_team(Request $request){
        return view('admin.team.volunteers_team');
    }
    
}
