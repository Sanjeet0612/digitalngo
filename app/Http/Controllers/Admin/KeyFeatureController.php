<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeyFeatureController extends Controller{

    public function key_features(Request $request){
        $contact = array();
        return view('admin.keyfeature.key_feature');
    }
    public function add_key_feature(Request $request){
        if($request->isMethod('post')){

        }else{
           
            return view('admin.keyfeature.add_feature_form');
        }
    }
}
