<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\CausesDonation;
use App\Models\GuestDonation;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller{
    
    public function index(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $refer_code = $user->refer_code;
        $myRefrerUser = User::where('sponsor_code',$refer_code)->count();
        $totDonation  = CausesDonation::where('user_id',$user_id)->where('is_paid',1)->sum('donation_amt');
        return view('dashboard.index',compact('myRefrerUser','totDonation'));
    }

    public function become_member(Request $request){
        return view('dashboard.become_member');
    }
    public function membership_fee(Request $request){
        if($request->isMethod('post')){
            $user = Auth::user();
            $validator = Validator::make(
                array_merge($request->all()),
                [
                    'amount'        => 'required|numeric|min:1',
                    'utrnumber'     => 'nullable|string|max:100|unique:tb_guest_donation,utr_number',
                    'screenshot'    => 'nullable|image|mimes:jpg,jpeg,png|max:500',
                ]
            );

            $validator->validate();
            $screenshotPath = null;
            if($request->hasFile('screenshot')) {
                $screenshotPath = $request->file('screenshot')->store('donations/screenshots', 'public');
            }

            DB::transaction(function () use ($request,$screenshotPath,$user) {
                // Donation insert
                GuestDonation::create([
                    'user_id'       => $user->id,
                    'package_amt'   => $request->amount,
                    'd_type'        => 'Membership',
                    'name'          => $user->name,
                    'email'         => $user->email,
                    'phone'         => $user->phone,
                    'utr_number'    => $request->utrnumber,
                    'screenshot'    => $screenshotPath,
                    'status'        => 0,
                ]);
                // Causes table me amount add karo
                //Causes::where('id', $rowid)->increment('received_amt', $request->amount);
            });

            return redirect()->back()->with('success', 'Thank you for your donation 🙏');
        }
        
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

            return redirect('/authentication/signin')->with('success', "User $name has logged out successfully");
        }
        // If no user is logged in
        return redirect('/authentication/signin');
    }

}