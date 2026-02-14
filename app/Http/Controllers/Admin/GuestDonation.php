<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Donation;

class GuestDonation extends Controller
{
    public function guest_donation(Request $request){
        $guestDonation = Donation::all();
        return view('admin.donation.guest_donation',compact('guestDonation'));
    }

    public function edit_guest_donation($id){
        $donationDetail = Donation::where('id',$id)->first();
        return view('admin.donation.edit_guest_donation',compact('donationDetail'));
    }

    public function update_guest_donation(Request $request,$id){
        if($request->isMethod('put')){
            $donationData = Donation::findOrFail($id);
            //print_r($donationData); die();
            $updated = $donationData->update([
                'is_paid' => $request->is_paid,
                'status'  => $request->status,
            ]);
            return redirect('admin/guest-donation')->with('success', 'Donation & Cause updated successfully ✅');
        }
    }
}
