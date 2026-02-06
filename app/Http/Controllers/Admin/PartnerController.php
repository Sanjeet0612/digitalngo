<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller{
    
    public function our_partners(Request $request){
        $keyFeature = array();
        return view('admin.partner.our_partner',compact('keyFeature'));
    }

    public function add_partners(Request $request){

        if($request->isMethod('post')){
            
            $request->validate([
                'partner_logo.*'   => 'required|image|mimes:png,jpg,jpeg,svg|max:500',
                'status' => 'required|in:0,1',
            ]);

            if($request->hasFile('partner_logo')) {

                foreach($request->file('partner_logo') as $logo) {
                    $filename = time().'_'.uniqid().'.'.$logo->getClientOriginalExtension();
                    $logo->move(public_path('uploads/partners'), $filename);
                    Partner::create([
                        'logo'   => 'uploads/partners/'.$filename,
                        'status' => $request->status,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Partner added successfully');

        }else{
            return view('admin.partner.our_partner_form');
        }
    }
}
