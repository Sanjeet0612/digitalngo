<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use App\Models\Admin\Banner;
use App\Models\Admin\Contact;
use App\Models\Admin\Sponsor;
use App\Models\Admin\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class AdminController extends Controller{

    public function admin_log(Request $request){
        return view('admin.authentication.signin');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect('admin/admin-log')->withErrors(['email' =>'Invalid admin credentials'])->withInput();
    }

    public function dashboard(Request $request){
        return view('admin.dashboard.index');
    }
    // Banner Section
    public function manage_banner(Request $request){
        $banners = Banner::orderBy('sort_order', 'asc')->latest()->get();
        return view('admin.banner.manage_banner',compact('banners'));
    }
    public function add_banner(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:800',
                'status' => 'required|in:0,1',
            ]);
            // image upload (public)
            $imagePath = $request->file('banner')->store('admin/uploads/banners', 'public');
            Banner::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'joinus_link' => $request->joinus,
                'video_link' => $request->videourl,
                'image_link' => $imagePath,
                'redirect_link' => $request->bannerurl,
                'status' => $request->status,
            ]);
            return redirect()->route('admin.manage_banner')->with('success', 'Banner added successfully');
        }else{
            return view('admin.banner.bannerForm');
        }
    }
    public function edit_banner($id){
        $banner = Banner::findOrFail($id);
        return view('admin.banner.editBannerForm', compact('banner'));
    }
    public function update_banner(Request $request, $id){
        $banner = Banner::findOrFail($id);
        $request->validate([
            'banner' => 'image|mimes:jpg,jpeg,png,webp|max:800',
            'status' => 'required|in:0,1',
        ]);
        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'joinus_link' => $request->joinus,
            'video_link' => $request->videourl,
            'redirect_link' => $request->bannerurl,
            'status' => $request->status,
            'sort_order' => $request->sort_order,
        ];
        // If new image uploaded
        if($request->hasFile('banner')){
            // delete old image
            if($banner->image_link && Storage::disk('public')->exists($banner->image_link)) {
                Storage::disk('public')->delete($banner->image_link);
            }
            // upload new image
            $data['image_link'] = $request->file('banner')->store('admin/uploads/banners', 'public');
        }

        $banner->update($data);
        return redirect()->route('admin.manage_banner')->with('success', 'Banner updated successfully');
    }
    // Contact Section Start
    public function manage_contact(Request $request){
        $contact = Contact::where('status', 1)->first();
        return view('admin.contact.manage_contact',compact('contact'));
    }
    public function add_contact(Request $request){
        if($request->isMethod('post')){

            Contact::updateOrCreate(
                ['id' => 1],   // ek hi record
                [
                    'phone' => $request->phone,
                    'emailid' => $request->emailid,
                    'workingDays' => $request->workingDays,
                    'officeTime' => $request->officeTime,
                    'address' => $request->address,
                    'short_desc' => $request->short_desc,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipcode' => $request->zipcode,
                    'country' => $request->country,
                    'fb_link' => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'insta_link' => $request->insta_link,
                    'behance_link' => $request->behance_link,
                    'youtube_link' => $request->youtube_link,
                    'copyright' => $request->copyright,
                    'created_by' => $request->created_by,
                    'created_by_url' =>$request->created_by_url,
                    'status' => 1
                ]
            );
                return back()->with('success','Contact details updated');
        }else{
            $contact = Contact::where('status', 1)->first();
            return view('admin.contact.contact_form',compact('contact'));
        }
    }
    // Event Sponsor Section Start
    public function manage_sponsor(Request $request){
        $sponsorList = Sponsor::all();
        return view('admin.event.manage_sponsor',compact('sponsorList'));
    }
    public function add_sponsor(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'sponsor_type' => 'in:gold,silver,bronze',
                'sponsor_name' => 'required|string|max:255',
                'emailid' => 'required|email',
                'phone' => 'nullable|string|max:20',
                'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:500', // 500 Kb max
            ]);
            $logoPath = null;
            if($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = time().'_'.Str::slug($request->name).'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/sponsors'), $filename);
                $logoPath = 'uploads/sponsors/'.$filename;
            }
            Sponsor::create([
                'name' => $request->sponsor_name,
                'phone' => $request->phone,
                'email' => $request->emailid,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'zipcode' => $request->zip_code,
                'description' => $request->description,
                'logo' => $logoPath,  // store path in DB
                'website' => $request->weburl,
                'sponsor_type' => $request->sponsor_type ?? 'bronze',
                'status' => 1,
            ]);

            return redirect()->back()->with('success', 'Sponsor created successfully');

         }else{
            
            return view('admin.event.sponsor_form');
         }
    }
    public function edit_sponsor(Request $request,$id){
        $sponsor = Sponsor::find($id); // id ke basis pe fetch
        if(!$sponsor){
            return redirect()->back()->with('error', 'Sponsor not found');
        }
        return view('admin.event.edit_sponsor_form', compact('sponsor'));
    }
    public function update_sponsor(Request $request,$id){
        // Fetch sponsor by ID
        $sponsor = Sponsor::findOrFail($id);
        // Validation
        $request->validate([
            'sponsor_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'emailid' => 'required|email|max:255',
            'address' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'zip_code' => 'nullable|string|max:60',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:500',
            'website' => 'nullable|url|max:255',
            'sponsor_type' => 'nullable|in:gold,silver,bronze',
        ]);

        // Handle logo upload
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            // Optional: delete old logo if exists
            if($sponsor->logo && file_exists(public_path($sponsor->logo))) {
                unlink(public_path($sponsor->logo));
            }
            $filename = time().'_'.Str::slug($request->sponsor_name).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/sponsors'), $filename);
            $sponsor->logo = 'uploads/sponsors/'.$filename;
        }
        // Update other fields
        $sponsor->name = $request->sponsor_name;
        $sponsor->phone = $request->phone;
        $sponsor->email = $request->emailid;
        $sponsor->address = $request->address;
        $sponsor->state = $request->state;
        $sponsor->city = $request->city;
        $sponsor->zipcode = $request->zip_code;
        $sponsor->description = $request->description;
        $sponsor->website = $request->weburl;
        $sponsor->sponsor_type = $request->sponsor_type ?? 'bronze';
        $sponsor->status = $request->status ?? 1;
        $sponsor->save();
        return redirect()->route('admin.manage_sponsor')->with('success', 'Sponsor updated successfully!');
    }
    public function manage_event(Request $request){
        $eventList = Event::all();
        return view('admin.event.manage_event',compact('eventList'));
    }
    public function add_event(Request $request){
         if($request->isMethod('post')){
                $request->validate([
                    'event_title'    => 'required|string|max:255',
                    'organizer_name' => 'nullable|string|max:255',
                    'emailid'        => 'nullable|email|max:255',
                    'phone'          => 'nullable|string|max:20',
                    'start_date'     => 'required|date',
                    'end_date'       => 'required|date|after_or_equal:start_date',
                    'address'        => 'required|string|max:255',
                    'state'          => 'required|string',
                    'city'           => 'required|string',
                    'zip_code'       => 'required|string',
                    'event_banner'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
                ]);

                /* Slug generate (unique) */
                $slug = Str::slug($request->event_title);
                $count = Event::where('slug', 'LIKE', "$slug%")->count();
                $slug = $count ? "{$slug}-{$count}" : $slug;

                /* Banner upload */
                $bannerPath = null;
                if($request->hasFile('event_banner')) {
                    $bannerPath = $request->file('event_banner')
                        ->store('admin/events/banner', 'public');
                }
                // Multiple sponsors ko comma separated string me convert karo
                $sponsor_id = $request->has('sponsors') ? implode(',', $request->sponsors) : null;    
                /* 🔹 Insert data */
                Event::create([
                    'title'       => $request->event_title,
                    'slug'        => $slug,
                    'og_name'     => $request->organizer_name,
                    'og_email'    => $request->emailid,
                    'og_phone'    => $request->phone,
                    'og_weblink'  => $request->og_weblink,
                    'description' => $request->description,
                    'start_date'  => $request->start_date,
                    'end_date'    => $request->end_date,
                    'e_time'      => $request->e_time,
                    'location'    => $request->location,
                    'address'     => $request->address,
                    'city'        => $request->city,
                    'state'       => $request->state,
                    'zipcode'     => $request->zip_code,
                    'user_id'     => Auth::id(), // logged-in user/admin
                    'sponsor_id'  => $sponsor_id,
                    'banner'      => $bannerPath,
                ]);

                return redirect()->route('admin.manage_event')->with('success', 'Event added successfully!');
         }else{
            $sponsor = Sponsor::all();
            $latestEvent = Event::latest()->take(5)->get();
            return view('admin.event.event_form',compact('sponsor','latestEvent'));
         }
    }
    public function edit_event($id){
        $rowid = base64_decode($id);
        $sponsor = Sponsor::all();
        $eventdata = Event::where('id',$rowid)->first();
        $latestEvent = Event::latest()->take(5)->get();
        return view('admin.event.edit_event_form',compact('eventdata','sponsor','latestEvent'));
    }
    public function update_event(Request $request,$id){
        if($request->isMethod('post')){
            $request->validate([
                'event_title'    => 'required|string|max:255',
                'organizer_name' => 'nullable|string|max:255',
                'emailid'        => 'nullable|email|max:255',
                'phone'          => 'nullable|string|max:20',
                'start_date'     => 'required|date',
                'end_date'       => 'required|date|after_or_equal:start_date',
                'address'        => 'required|string|max:255',
                'state'          => 'required|string',
                'city'           => 'required|string',
                'zip_code'       => 'required|string',
                'event_banner'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:500',
            ]);

            $event = Event::findOrFail($id);

            $event->title       = $request->event_title;
            $event->slug        = Str::slug($request->event_title);
            $event->og_name     = $request->organizer_name;
            $event->og_email    = $request->emailid;
            $event->og_phone    = $request->phone;
            $event->og_weblink  = $request->og_weblink;
            $event->description = $request->description;
            $event->start_date  = $request->start_date;
            $event->end_date    = $request->end_date;
            $event->e_time      = $request->e_time;
            $event->location    = $request->location;
            $event->address     = $request->address;
            $event->city        = $request->city;
            $event->state       = $request->state;
            $event->zipcode     = $request->zip_code;

            // sponsors[] ko implode karke save
            if($request->has('sponsors')) {
                $event->sponsor_id = implode(',', $request->sponsors);
            }

            // EVENT BANNER UPDATE
            if($request->hasFile('event_banner')) {
                // old image delete
                if($event->banner && File::exists(public_path('admin/uploads/events/'.$event->banner))) {
                    File::delete(public_path('admin/uploads/events/'.$event->banner));
                }
                $bannerPath = $request->file('event_banner')->store('admin/events/banner', 'public');
                $event->banner = $bannerPath;
            }
            $event->save();
            return redirect()->back()->with('success', 'Event updated successfully');
        }else{

        }
    }
    public function view_event($id){
    }
    public function logout(Request $request){
        if(Auth::check()) { // check if user is logged in
            $user = Auth::user();  // full user object
            $name = $user->name;
            $email = $user->email;
            // Perform logout
            Auth::logout();
            // Clear session
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('admin/admin-log')->with('success', "User $name has logged out successfully");
        }
        // If no user is logged in
        return redirect('admin/admin-log');
    }

}