<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function signin(Request $request){

        if($request->isMethod('post')){
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required|min:6',
            ]);
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)) {
                // Login successful
                $request->session()->regenerate(); // prevent session fixation
                return redirect()->intended('/dashboard'); // redirect after login
            }
            // Login failed
            return back()->withErrors(['email' => 'Invalid credentials',])->withInput();
        }else{
            return view('authentication/signin');
        }
    }
    protected function generateUniqueReferCode($length=8){
        do {
            $code = strtoupper(Str::random($length)); // eg: "A1B2C3D4"
        } while (User::where('refer_code', $code)->exists());
        return $code;
    }
    public function signup(Request $request){

        if($request->isMethod('post')){

            $request->validate([
                'username' => 'required|string|max:100',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);
            $referCode = $this->generateUniqueReferCode(); // call helper method
            User::create([
                'name'         => $request->username,
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
                'sponsor_code' => $request->refer_username,
                'refer_code'   => $referCode,
            ]);

            return redirect()->route('signup')->with('success', 'Signup successful');
        }else{
            return view('authentication.signup');
        }
    }

    
    
    
}
