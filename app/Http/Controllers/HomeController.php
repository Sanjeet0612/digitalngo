<?php

namespace App\Http\Controllers;
use App\Models\Admin\Event;
use App\Models\Admin\Management;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\EventGallery;
use App\Models\Admin\Banner; 
use App\Models\Admin\Gallery;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(Request $request){
        $banners = Banner::where('status',1)->orderBy('sort_order','asc')->get();
        return view('front.index',compact('banners'));
    }
    public function about(Request $request){
        return view('front.about');
    }
    public function management(Request $request){
        $allManagement = Management::where('team_type','management')->where('status',1)->get();
        $allgoverning  = Management::where('team_type','governing')->where('status',1)->get();
        return view('front.management',compact('allManagement','allgoverning'));
    }
    public function volunteers(Request $request){
        $allvolunteer  = Management::where('team_type','volunteer')->where('status',1)->get();
        return view('front.volunteers',compact('allvolunteer'));
    }
    public function image(Request $request){
        $allCat = GalleryCategory::where('status',1)->get();
        //print_r($allCat);
        $gallImg = Gallery::where('status',1)->get();
        return view('front.image',compact('allCat','gallImg'));
    }
    public function video(Request $request){
        $galleryList = Gallery::where('gtype','video')->where('status',1)->with('category')->orderBy('id', 'desc')->paginate(12);
        return view('front.video',compact('galleryList'));
    }
    public function events(Request $request){
        $event = Event::where('status',1)->get();
        return view('front.events',compact('event'));
    }
    public function event_details($slug){
        $eventDetail  = Event::where('slug',$slug)->first()->toArray();
        $eventGallery = EventGallery::where('event_id',$eventDetail['id'])->where('status',1)->get()->toArray();
        return view('front.events_detail',compact('eventDetail','eventGallery'));
    }
    public function articles(Request $request){
        return view('front.articles');
    }
    public function contact(Request $request){
        return view('front.contact');
    }
    public function donation(Request $request){
        return view('front.donation');
    }
    

    public function askAi()
    {
        $response = Http::withToken(config('services.openai.key'))
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => 'Hello AI'
                    ]
                ],
            ]);

        return $response->json();
    }

    
}