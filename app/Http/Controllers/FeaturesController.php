<?php

namespace App\Http\Controllers;
use App\Models\Admin\KeyFeature;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function all_features(){
        $allFeature = KeyFeature::where('status',1)->get();
        return view('features.all_features',compact('allFeature'));
    }
}
