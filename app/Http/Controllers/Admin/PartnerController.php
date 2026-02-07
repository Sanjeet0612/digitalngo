<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PartnerController extends Controller{
    
    public function our_partners(Request $request){
        $allpartner = Partner::all();
        return view('admin.partner.our_partner',compact('allpartner'));
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

            return redirect('admin/our-partners')->with('success', 'Partner added successfully');

        }else{
            return view('admin.partner.our_partner_form');
        }
    }

    public function edit_our_partner($id){
        $partnerData = Partner::where('id',$id)->first();
        return view('admin.partner.edit_partner_form',compact('partnerData'));
    }

    public function update_partners(Request $request,$id){
        if($request->isMethod('put')){
            
            $request->validate([
                'partner_logo.*'   => 'nullable|image|mimes:png,jpg,jpeg,svg|max:500',
                'status' => 'required|in:0,1',
            ]);

            // Partner fetch karna
            $partner = Partner::findOrFail($id);
            $partner->status = $request->status;

            // Logo update ho raha hai?
            if($request->hasFile('logo')){
                // Purana logo delete karna
                $oldLogo = public_path($partner->logo);
                if(File::exists($oldLogo)){
                    File::delete($oldLogo);
                }
                // Naya logo upload karna
                $file = $request->file('logo');
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('uploads/partners/'), $fileName);
                // Partner table me update karna
                $partner->logo = $fileName;
            }

            $partner->save();
            return redirect('admin/our-partners')->with('success', 'Partner updated successfully!');

        }
    }

    public function delete_partner($id){
        // Partner fetch karna
        $partner = Partner::findOrFail($id);
        // Logo delete karna (agar file exist kare)
        $logoPath = public_path('uploads/partners/'.$partner->logo);
        if(File::exists($logoPath)) {
            File::delete($logoPath);
        }
        // Partner record delete karna
        $partner->delete();
        return redirect('admin/our-partners')->with('success', 'Partner deleted successfully!');
    }
}
