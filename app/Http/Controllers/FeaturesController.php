<?php

namespace App\Http\Controllers;
use App\Models\Admin\KeyFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class FeaturesController extends Controller
{
    public function all_features(){
        $allFeature = KeyFeature::where('status',1)->get();
        return view('features.all_features',compact('allFeature'));
    }

    public function feature_pdf(Request $request){
        if(Auth::check()) { // check if user is logged in
            $user = Auth::user();  // full user object
            $name = $user->name;
            $email = $user->email;
            $id    = $request->id;
            $title = $request->title;
            // PDF generate
            if($id==1){
                $pdf = Pdf::loadView('features.id_card_full', [
                    'user'  => $user,
                    'id'    => $id,
                    'title' => $title
                ]);
            }
            if($id==2){
                $pdf = Pdf::loadView('features.appointment_card', [
                    'user'  => $user,
                    'id'    => $id,
                    'title' => $title
                ]);
            }
            if($id==3){
                $pdf = Pdf::loadView('features.membership_certificate', [
                    'user'  => $user,
                    'id'    => $id,
                    'title' => $title
                ]);
            }
            if($id==4){
                $pdf = Pdf::loadView('features.achievement_certificate', [
                    'user'  => $user,
                    'id'    => $id,
                    'title' => $title
                ]);
            }
            
            // download ya stream
            return $pdf->download(str()->slug($title).'.pdf');
        }
    }
}
