<?php

namespace App\Http\Controllers;
use App\Models\Admin\Event;
use App\Models\Admin\EventGallery;
use App\Models\Admin\Banner; 
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
        return view('front.management');
    }
    public function volunteers(Request $request){
        return view('front.volunteers');
    }
    public function image(Request $request){
        return view('front.image');
    }
    public function video(Request $request){
        return view('front.video');
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