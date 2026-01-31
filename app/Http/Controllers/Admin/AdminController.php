<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use App\Models\Admin\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminController extends Controller{

    public function index(Request $request){
        return view('admin.authentication.signin');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors(['email' =>'Invalid admin credentials'])->withInput();
    }

    public function dashboard(Request $request){
        return view('admin.dashboard.index');
    }
    // Banner Section
    public function manage_banner(Request $request){
        $banners = Banner::orderBy('sort_order', 'asc')->latest()->get();
        return view('admin.banner.manage_banner',compact('banners'));
    }
    public function add_banner(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:800',
                'status' => 'required|in:0,1',
            ]);
            // image upload (public)
            $imagePath = $request->file('banner')->store('admin/uploads/banners', 'public');
            Banner::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'joinus_link' => $request->joinus,
                'video_link' => $request->videourl,
                'image_link' => $imagePath,
                'redirect_link' => $request->bannerurl,
                'status' => $request->status,
            ]);
            return redirect()->route('admin.manage_banner')->with('success', 'Banner added successfully');
        }else{
            return view('admin.banner.bannerForm');
        }
    }
    public function edit_banner($id){
        $banner = Banner::findOrFail($id);
        return view('admin.banner.editBannerForm', compact('banner'));
    }
    public function update_banner(Request $request, $id){
        $banner = Banner::findOrFail($id);
        $request->validate([
            'banner' => 'image|mimes:jpg,jpeg,png,webp|max:800',
            'status' => 'required|in:0,1',
        ]);
        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'joinus_link' => $request->joinus,
            'video_link' => $request->videourl,
            'redirect_link' => $request->bannerurl,
            'status' => $request->status,
            'sort_order' => $request->sort_order,
        ];
        // If new image uploaded
        if($request->hasFile('banner')){
            // delete old image
            if($banner->image_link && Storage::disk('public')->exists($banner->image_link)) {
                Storage::disk('public')->delete($banner->image_link);
            }
            // upload new image
            $data['image_link'] = $request->file('banner')->store('admin/uploads/banners', 'public');
        }

        $banner->update($data);
        return redirect()->route('admin.manage_banner')->with('success', 'Banner updated successfully');
    }
    // Contact Section Start
    public function manage_contact(Request $request){
        return view('admin.contact.manage_contact');
    }
    public function logout(Request $request){
        if(Auth::check()) { // check if user is logged in
            $user = Auth::user();  // full user object
            $name = $user->name;
            $email = $user->email;
            // Perform logout
            Auth::logout();
            // Clear session
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/admin')->with('success', "User $name has logged out successfully");
        }
        // If no user is logged in
        return redirect('/admin');
    }

}