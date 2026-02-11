<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function manage_causes_donation(){
        return view('donation.causes_donation_list');
    }
}
