<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller{

    public function my_profile(Request $request){
        $user = Auth::user();
        return view('dashboard.my_profile', compact('user'));
    }
    public function getPan($filename){
        $user = Auth::user();
        // filename me folder name remove kar lo
        $file = basename($filename);
        $path = storage_path('app/private/uploads/pan/' . $file);
        if(!file_exists($path)) {
            abort(404);
        }
        return response()->file($path); // serve the file securely
    }
    public function getAadhar($filename){
        $user = Auth::user();
        // filename me folder name remove kar lo
        $file = basename($filename);
        $path = storage_path('app/private/uploads/adhar/' . $file);
        if(!file_exists($path)) {
            abort(404);
        }
        return response()->file($path); // serve the file securely
    }

    public function update_profile(Request $request){
        $user = Auth::user();
        $request->validate([
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'gender'      => 'required|in:male,female,other',
            'address'     => 'required|string|max:255',
            'city'        => 'required|string|max:100',
            'state'       => 'required|string|max:100',
            'zipcode'     => 'required|string|max:10',
            'bio'         => 'nullable|string|max:500',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
            'bg_img'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
            'pan_img'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
            'adhar_img'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
        ]);
        // Profile Image
        if($request->hasFile('profile_img')) {
            if ($user->profile_img) {
                Storage::disk('public')->delete($user->profile_img);
            }
            $user->profile_img = $request->file('profile_img')
                ->store('uploads/profile', 'public');
        }
        // Background Image
        if($request->hasFile('bg_img')) {
            if($user->bg_img) {
                Storage::disk('public')->delete($user->bg_img);
            }
            $user->bg_img = $request->file('bg_img')
                ->store('uploads/background', 'public');
        }
        // PAN Image
        if($request->hasFile('pan_img')) {
            // Delete old file if exists
            if ($user->pan_img && Storage::disk('private')->exists($user->pan_img)) {
                Storage::disk('private')->delete($user->pan_img);
            }
            // Store new PAN image in private/uploads/pan (or private if needed)
            $user->pan_img = $request->file('pan_img')->store('uploads/pan', 'private');
        }
        // Aadhaar Image
        if ($request->hasFile('adhar_img')) {
            // Delete old file if exists
            if ($user->adhar_img && Storage::disk('private')->exists($user->adhar_img)) {
                Storage::disk('private')->delete($user->adhar_img);
            }
            // Store new Aadhaar image
            $user->adhar_img = $request->file('adhar_img')->store('uploads/adhar', 'private');
        }
        // Other fields update
        $user->update([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'gender'    => $request->gender,
            'address'   => $request->address,
            'city'      => $request->city,
            'state'     => $request->state,
            'zipcode'   => $request->zipcode,
            'bio'       => $request->bio,
            'pan_num'   => $request->pan_num,
            'adhar_num' => $request->adhar_num,
        ]);
        return back()->with('success', 'Profile updated successfully');
    }

    public function update_password(Request $request){
        // Validate
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        // Logged-in user
        $user = auth()->user();
        // Password update (HASHING REQUIRED)
        $user->password = Hash::make($request->password);
        $user->save();
        // Response
        return back()->with('success', 'Password successfully updated');
    }

    public function new_user(Request $request){
        $user = auth()->user();
        $refCode  = $user->refer_code; 
        $users = User::where('sponsor_code',$refCode )->orderByDesc('created_at')->paginate(12); // 12 users per page
        return view('users.usersGrid', ['userlist'=>$users]);
    }
    public function view_profile(Request $request){
        $userid = base64_decode($request->uid); 
        $user = User::find($userid);
        return view('users.view_profile',['userlist'=>$user]);
    }
    public function userList(Request $request){
        $query = User::query();
        if($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        $users = $query->where('created_at', '>=', now()->subDays(15))
                    ->orderByDesc('created_at')
                    ->paginate(12)
                    ->withQueryString();

        // Agar AJAX request hai
        if ($request->ajax()) {
            return view('users.partials.user_grid', ['userlist' => $users])->render();
        }
        return view('users.usersGrid', ['userlist' => $users]);

    }

}