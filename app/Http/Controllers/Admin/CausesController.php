<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CausesController extends Controller{
    
    public function manage_causes_category(Request $request){
        $keyFeature = array();
        return view('admin.causes.manage_causes_cat',compact('keyFeature'));
    }

    public function add_cause_category(Request $request){

        if($request->isMethod('post')){

        }else{
            return view('admin.causes.add_causes_cat');
        }
    }
}
