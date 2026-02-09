<?php

namespace App\Http\Controllers;
use App\Models\Admin\Event;
use App\Models\Admin\Sponsor;
use App\Models\Admin\Management;
use App\Models\Admin\GalleryCategory;
use App\Models\Admin\EventGallery;
use App\Models\Admin\Banner; 
use App\Models\Admin\Gallery;
use App\Models\Admin\KeyFeature;
use App\Models\Admin\CausesCategory;
use App\Models\Admin\Causes;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\GuestDonation;
use App\Models\ModelContactForm;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(Request $request){
        $banners = Banner::where('status',1)->orderBy('sort_order','asc')->get();
        return view('front.index',compact('banners'));
    }
    public function about(Request $request){
        $allManagement = Management::where('team_type', 'management')->where('status', 1)->take(4)->get();
        return view('front.about',compact('allManagement'));
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
        $gallImg = Gallery::where('gtype','photo')->where('status',1)->get();
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
        $sponsorIds = explode(',',$eventDetail['sponsor_id']);
        $sponsors = Sponsor::whereIn('id', $sponsorIds)->get();
        //print_r($sponsors);
        $eventGallery = EventGallery::where('event_id',$eventDetail['id'])->where('status',1)->get()->toArray();
        return view('front.events_detail',compact('eventDetail','eventGallery','sponsors'));
    }
    public function articles(Request $request){
        $allBlog = Blog::where('status','published')->get();
        $categories = Blog::where('status', 'published')->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->orderByDesc('total')->get();
        $latestblogs = Blog::where('status','published')->where('created_at', '>=', now()->subDays(7))->orderByDesc('created_at')->get();
        $tags = Blog::where('status','published')->selectRaw('tags, COUNT(*) as total')->groupBy('tags')->orderByDesc('total')->get();
        $allCauses = Causes::where('status',1)->get();
        return view('front.articles',compact('allBlog','categories','latestblogs','tags','allCauses'));
    }
     // Category wise blogs
    public function category($category){
        $categories = Blog::where('status', 'published')->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->orderByDesc('total')->get();
        $allBlog = Blog::where('status', 'published')->where('category', $category)->latest()->paginate(12);
        $latestblogs = Blog::where('status', 'published')->where('created_at', '>=', now()->subDays(7))->orderByDesc('created_at')->get();
        $tags = Blog::where('status', 'published')->selectRaw('tags, COUNT(*) as total')->groupBy('tags')->orderByDesc('total')->get();
        return view('front.articles',compact('allBlog','categories','latestblogs','tags'));
    }
    // Tag wise blogs
    public function tags($tag){
        $allBlog = Blog::where('status', 'published')->where('tags', 'LIKE', "%$tag%")->latest()->paginate(12);
        $categories = Blog::where('status', 'published')->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->orderByDesc('total')->get();
        $latestblogs = Blog::where('status', 'published')->where('created_at', '>=', now()->subDays(7))->orderByDesc('created_at')->get();
        $tags = Blog::where('status', 'published')->selectRaw('tags, COUNT(*) as total')->groupBy('tags')->orderByDesc('total')->get();
        return view('front.articles',compact('allBlog','categories','latestblogs','tags'));
    }
    public function artical_detail($slug){
        $blog = Blog::where('slug', $slug)->where('status', 'published')->firstOrFail(); // only active blogs
        $latestblogs = Blog::where('status', 'published')->where('created_at', '>=', now()->subDays(7))->orderByDesc('created_at')->get();
        $categories = Blog::where('status', 'published')->select('category', DB::raw('COUNT(*) as total'))->groupBy('category')->orderByDesc('total')->get();
        $tags = Blog::where('status', 'published')->selectRaw('tags, COUNT(*) as total')->groupBy('tags')->orderByDesc('total')->get();
        $comments = BlogComment::where('blog_id', $blog->id)->whereNull('parent_id')->where('status', 1)->with(['user', 'replies.user'])->latest()->get();
        $totalComments = BlogComment::where('blog_id', $blog->id)->where('status', 1)->count();
        $title = 'Blog';
        
        return view('front.blog_detail', compact('blog','latestblogs','categories','tags','comments','totalComments'));
    }
    public function contact(Request $request){
        if($request->isMethod('post')){

            // Validation
            $request->validate([
                'c_name'    => 'required|string|max:255',
                'c_mobile'  => 'required|string|max:20',
                'c_email'   => 'required|email|max:255',
                'c_sub'     => 'required|string|max:255',
                'c_message' => 'required|string',
            ],[
                'c_name'    => 'Name is required!',
                'c_mobile'  => 'Phone Number is required',
                'c_email'   => 'Email is required',
                'c_sub'     => 'Subject is required',
                'c_message' => 'Message is required',

            ]);
            // Insert data
            ModelContactForm::create([
                'name'    => $request->c_name,
                'phone'   => $request->c_mobile,
                'email'   => $request->c_email,
                'subject' => $request->c_sub,
                'message' => $request->c_message,
                'status'  => 1
            ]);
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        }else{
            return view('front.contact');
        }
        
    }
    public function donation(Request $request){

        if($request->isMethod('post')){

            $request->validate([
                'package_amt' => 'required|numeric|min:100',
                'name'        => 'required|string|max:150',
                'phone'       => 'required|string|max:20',
                'email'       => 'nullable|email|max:150',
                'city'        => 'nullable|string|max:100',
                'state'       => 'nullable|string|max:100',
                'address'     => 'nullable|string',
                'pincode'     => 'nullable|string|max:10',
                'refrer_code' => 'nullable|exists:users,refer_code',
            ],
            [
                'refrer_code.exists' => 'Invalid referral code.',
            ]);

            $data = $request->only([
                'package_amt',
                'name',
                'phone',
                'email',
                'city',
                'state',
                'address',
                'pincode',
                'refrer_code',
            ]);
            // default status (pending / success as per your logic)
            $data['status'] = 1;
            GuestDonation::create($data);
            return redirect()->back()->with('success', 'Thank you! Your donation details have been submitted successfully.');

        }else{
            return view('front.donation');
        }
        
    }

    public function function_features(){
        $allFeature = KeyFeature::where('status',1)->get();
        return view('front.function_features',compact('allFeature'));
    }

    public function causes($slug=null){
        if(!empty($slug)){
            $allCat       = CausesCategory::where('status', 1)->orderBy('cat_name', 'asc')->get();
            $allCauses    = Causes::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
            $allCauses    = Causes::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
            $causesDetail = Causes::where('slug', $slug)->where('status',1)->firstOrFail(); // only active Causes
            return view('front.causes_detail',compact('causesDetail','allCauses','allCat'));
        }else{
           $allCauses    = Causes::where('status', 1)->orderBy('id', 'desc')->take(3)->get(); 
           return view('front.all_causes',compact('allCauses'));
        }
        
    }
    public function cause_category($slug){

    }
    

    public function askAi(){
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