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
}
