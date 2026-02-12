<?php

namespace App\Http\Controllers;
use App\Models\Admin\Causes;
use App\Models\CausesDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function manage_causes_donation(){
        $allCauses = Causes::all();
        return view('donation.causes_donation_list',compact('allCauses'));
    }
    public function cause_donation(Request $request,$id){
        $causesData = Causes::where('id',$id)->first();
        return view('donation.causes_donation_form',compact('causesData'));
    }
    public function donation_for_cause(Request $request){
        $user = Auth::user();
        $rowid = $request->cause_id;
       
        $validator = Validator::make(
            array_merge($request->all(), ['rowid' => $rowid]),
            [
                'amount'        => 'required|numeric|min:1',
                'utrnumber'     => 'nullable|string|max:100|unique:tb_causes_donation,utr_number',
                'screenshot'    => 'nullable|image|mimes:jpg,jpeg,png|max:500',
            ]
        );

        $validator->validate();
        $screenshotPath = null;
        if($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('donations/screenshots', 'public');
        }
        
        DB::transaction(function () use ($request,$rowid,$screenshotPath,$user) {
            // Donation insert
            CausesDonation::create([
                'user_id'       => $user->id,
                'causes_id'     => $rowid,
                'donation_amt'  => $request->amount,
                'name'          => $user->name,
                'email'         => $user->email,
                'phone'         => $user->phone,
                'utr_number'    => $request->utrnumber,
                'screenshot'    => $screenshotPath,
                'donation_date' => now()->toDateString(),
                'status'        => 0,
            ]);
            // Causes table me amount add karo
            //Causes::where('id', $rowid)->increment('received_amt', $request->amount);
        });
        return redirect()->back()->with('success', 'Thank you for your donation 🙏');

    }

    public function my_causes_donation(Request $request){
        $user = Auth::user();
        $allCausesDonation = CausesDonation::with('cause')->where('user_id', $user->id)->get();
        ///print_r($allCausesDonation);
        return view('donation.my_donation_list',compact('allCausesDonation'));
    }
}
