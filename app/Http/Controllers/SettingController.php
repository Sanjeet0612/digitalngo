<?php

namespace App\Http\Controllers;
use App\Models\SettingModel; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'ngoname'   => 'required|string|max:255',
                'ngologo'   => 'required|image|mimes:jpg,jpeg,png|max:500',
                'signature' => 'required|image|mimes:jpg,jpeg,png|max:500',
                'email'     => 'required|email|max:255|unique:tb_setting,email',  // Unique email
                'phone'     => 'nullable|string|max:20|unique:tb_setting,phone', // Duplicate check here
                'address'   => 'nullable|string',
                'city'      => 'nullable|string|max:100',
                'state'     => 'nullable|string|max:100',
                'zipcode'   => 'nullable|string|max:10',
            ]);

            $userId = Auth::id();
            // Check if setting already exists for this user
            $existing = SettingModel::where('user_id', $userId)->first();
            if($existing) {
                return redirect()->back()->with('error', 'You have already added your setting!');
            }

            // Upload files
            $logoPath = $request->file('ngologo')->store('setting/ngologo', 'public');
            $signaturePath = $request->file('signature')->store('private/signature'); 

            SettingModel::create([
                'user_id'   => Auth::id(), // Logged-in user ID
                'ngoname'   => $request->ngoname,
                'ngologo'   => $logoPath,
                'signature' => $signaturePath,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'address'   => $request->address,
                'city'      => $request->city,
                'state'     => $request->state,
                'zipcode'   => $request->zipcode,
            ]);

            return redirect()->back()->with('success', 'Setting added successfully!');

        }else{
            $userId = Auth::id();
            $existingDetail = SettingModel::where('user_id', $userId)->first();
            return view('setting.settingForm',compact('existingDetail'));
        }
        
    }

    public function getSignature($filename){
        $user = Auth::user();
        // filename me folder name remove kar lo
        $file = basename($filename);
        $path = storage_path('app/private/signature/' . $file);
        if(!file_exists($path)) {
            abort(404);
        }
        return response()->file($path); // serve the file securely
    }
}
