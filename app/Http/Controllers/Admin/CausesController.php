<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CausesController extends Controller{
    
public function causes_category(){
    return view('admin.causes.causes_category');
}
    public function manage_causes(Request $request){
        $keyFeature = array();
        return view('admin.causes.manage_causes',compact('keyFeature'));
    }

    public function add_cause(Request $request){

        if($request->isMethod('post')){
            if($request->validate([
                'title' => 'required',
            ]));
        }else{
            return view('admin.causes.add_causes');
        }
    }
}
