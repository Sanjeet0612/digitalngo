<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{
    
    public function index(Request $request){
        return view('dashboard.index');
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