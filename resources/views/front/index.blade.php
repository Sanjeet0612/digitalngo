@include('front.includes.new_header')
    <!-- Banner Start -->
    <section class="main-banner home-style-second">
        <div class="slides-wrap">
            <div class="owl-carousel owl-theme">
                <!--/owl-slide-->
                @foreach($banners as $bannersVal)
                <div class="owl-slide d-flex align-items-center cover" style="background-image: url({{ asset('storage/'.$bannersVal->image_link)}});">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start no-gutters">
                            <div class="col-10 col-md-9 static">
                                <div class="owl-slide-text">
                                    @if(!empty($bannersVal->title))
                                    <h3 class="owl-slide-animated owl-slide-title">{{$bannersVal->title}}</h3>
                                    @endif
                                    @if(!empty($bannersVal->subtitle))
                                    <h1 class="owl-slide-animated owl-slide-subtitle">
                                        {{$bannersVal->subtitle}}
                                    </h1>
                                    @endif
                                    <div class="owl-slide-animated owl-slide-cta">                                        
                                        <a class="btn btn-default mr-3" href="#" role="button">Join Us Now</a>
                                        @if(!empty($bannersVal->video_link))
                                        <a class="slider-link popup-video" href="{{$bannersVal->video_link}}">Watch the video <i class="charity-play_button"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--/owl-slide-->
            </div>
            
        </div>
    </section>
    <!-- Banner Start -->

    <!-- Main Body Content Start -->
    <main id="body-content" class="body-non-overflow">

        <!-- Donation Style Start -->
        <section class="bg-white">
            <div class="container">
                <div class="row align-items-center">  
                    <div class="col-lg-5 col-md-12 order-lg-last">
                        <div class="home-second-donation-form">                                                    
                            <div class="funds-committed">
                                <div class="gift-icon">
                                    <i class="charity-gift_box"></i>
                                </div>
                                <small>Total Funds Committed</small>
                                <span class="counter">{{$donationAmt}}</span>
                            </div>

                            <div class="message">
                                @if(session('success'))
                                    <p style="color:green">{{ session('success') }}</p>
                                @endif

                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <p style="color:red">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div> 

                           <form action="{{route('easy_donation')}}" method="post" class="form-style" onsubmit="return validateForm()">
                                @csrf
                                <input type="hidden" name="easy_donation" value="easy_donation">
                                <h3 class="h3-sm fw-7 txt-white mb-3">Easy Donation</h3>
                            
                                <div class="form-group">
                                    <label for="name"><strong>Full Name</strong></label>
                                    <input type="text" class="form-control form-light" name="d_name" id="name" placeholder="e.g John Doe" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="email"><strong>Email Address</strong></label>
                                    <input type="email" class="form-control form-light" name="d_email" id="email" placeholder="e.g example@sitename.com" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="mobile"><strong>Mobile Number</strong></label>
                                    <input type="tel" class="form-control form-light" name="d_mobile" id="mobile" placeholder="e.g +91 90889 98800" required pattern="[0-9]{10}">
                                </div>
                            
                                <div class="form-group">
                                    <label for="pancard"><strong>PAN Card</strong> <small>(optional)</small></label>
                                    <input type="text" class="form-control form-light" name="d_pancard" id="pancard" placeholder="ABCTY1234D">
                                </div>
                            
                                <div class="form-group">
                                    <label for="state"><strong>Select Causes</strong></label>
                                    <select class="theme-combo home-charity" id="state" name="d_causes" required style="height: 400px">
                                        <option value="">Select Causes</option>
                                        <option value="Charity For Plant">Charity For Plant</option>
                                        <option value="Charity For Water">Charity For Water</option>
                                        <option value="Charity For Food">Charity For Food</option>
                                        <option value="Charity For Education">Charity For Education</option>
                                        <option value="Charity For Natural Disaster">Charity For Natural Disaster</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label><strong>Amount</strong></label><br>
                                    <?php
                                    $preset_amounts = [100, 500, 1000, 5000, 10000];
                                    foreach ($preset_amounts as $i => $amount) {
                                        echo '<div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline' . ($i + 1) . '" name="radio_amount" value="' . $amount . '" class="custom-control-input" onclick="setAmount(this.value)">
                                                <label class="custom-control-label" for="customRadioInline' . ($i + 1) . '">₹ ' . $amount . '</label>
                                            </div>';
                                    }
                                    ?>
                                    <div class="mt-3">
                                        <input type="number" name="input_amount" class="form-control form-light" id="custom" placeholder="Custom Amount" required>
                                    </div>
                                </div>
                            
                                <button type="submit" name="donation" class="btn btn-default mt-3 btn-block">Donate now</button>
                            </form>
                                
                        </div>
                    </div> 
                    
                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-none d-md-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <div class="col-lg-7 col-md-12">
                        <div>
                            
                            <h1 class="heading-main">
                                <small>Lets Join Hands</small>
                                Together We Can Make A Change
                            </h1>
                            <p>Today Trees are being cut at a rate that if it keep going on then there will a time that forest will be just a history that we have in books, for building Infrastructure, Society etc a large numbers of trees are been cut which has a direct impact on our enviroment. Therefore we have decided to take an step to spread more awareness and plant more trees</p>                        

                            <div class="row my-5 home-second-welcome">                      
                                <!-- Map Icons Start -->
                                <div class="col-sm-6 mb-md-0">
                                    <div class="icon-box-1">
                                        <i class="charity-volunteer_people"></i>
                                        <div class="text">
                                            <h3>3,750 <br> <span>Volunteers</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Map Icons Start -->

                                <!-- Map Icons Start -->
                                <div class="col-sm-6">
                                    <div class="icon-box-1">
                                        <i class="charity-donate_money"></i>
                                        <div class="text">
                                            <h3>14,800 <br> <span>Trusted Funds</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Map Icons Start -->
                            </div>

                            <a href="{{route('donation')}}"  class="btn btn-outline-default">Become a Volunteer</a>
                        </div>
                    </div>

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-none d-md-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    
                </div>
            </div>
        </section>
        <!-- Donation Style Start -->

        <!-- Callout Style Start -->
        <section class="wide-tb-100 bg-scroll bg-img-1 pos-rel callout-style-1">
            <div class="bg-overlay black opacity-50"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="heading-main light-mode orange">
                            <small>Make An Effort</small>
                            We Wish To Make Our Planet Green, Beacuse We have Only One 
                        </h1>
                        <a href="{{route('donation')}}" class="btn btn-default">Donate Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Style End -->

        <!-- Images Gallery Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row img-gallery">                    
                    <div class="col-lg-4">
                        <h1 class="heading-main mb-lg-0">
                            <small>Images Gallery</small>
                            Our Recent Works
                        </h1>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="{{url('/')}}/front/assets/images/gallery/ed4.jpg" title="School Development">
                                <div class="gallery-content">
                                    <div class="tag"><span>Education</span></div>
                                    <h3>Skill Development</h3>
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="{{url('/')}}/front/assets/images/gallery/ed4.jpg" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="{{url('/')}}/front/assets/images/gallery/c1.jpeg" title="Child Welfare">
                                <div class="gallery-content">
                                    <div class="tag"><span>Puja</span></div>
                                    <h3>Social Work</h3>
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="{{url('/')}}/front/assets/images/gallery/c1.jpeg" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="{{url('/')}}/front/assets/images/gallery/cow.jpg" title="Child Welfare">
                                <div class="gallery-content">
                                    <div class="tag"><span>Cow savaya</span></div>
                                    <h3>Cow savaya</h3>
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="{{url('/')}}/front/assets/images/gallery/cow.jpg" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="{{url('/')}}/front/assets/images/gallery/d5.jpg" title="Child Welfare">
                                <div class="gallery-content">
                                    <div class="tag"><span>Water</span></div>
                                    <h3>Water distribution</h3>
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="{{url('/')}}/front/assets/images/gallery/d5.jpg" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="{{url('/')}}/front/assets/images/gallery/plant.jpg" title="Child Welfare">
                                <div class="gallery-content">
                                    <div class="tag"><span>Plant</span></div>
                                    <h3>Plant Distribution</h3>
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="{{url('/')}}/front/assets/images/gallery/plant.jpg" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Images Gallery Style End -->

        <!-- About Us Style Start -->
        <section class="wide-tb-100 bg-white shadow">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="text-center">
                            <img src="{{url('/')}}/front/assets/images/about_img.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>About Us</small>
                            Let's Take A Step Forward To Make Our Planet Greener
                        </h1>

                        <p>This Planet is our home and it's enviroment is our responsibility, Today Environment problem is a Global Issue and every country is taking action towards it. In this journey every steps counts so you can take a step forward and join hands with us in the mission to make our planet Green</p>

                        <div class="icon-box-1 my-4">
                            <i class="charity-volunteer_people"></i>
                            <div class="text">
                                <h3>Join As Volunteer</h3>
                                <p>You Support Matters To Us. Mahror Foundation Welcomes You To Join Us As Volunteer.</p>
                            </div>
                        </div>    
                        
                        <div class="d-flex">
                            <a class="btn btn-default mr-3" href="{{route('donation')}}">Join Now</a>
                            <div class="about-phone">
                                <i data-feather="phone-call"></i>
                                Conatct Us <br> +91 8478884111
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->

        <!-- Event Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-lg-6 col-md-8">
                        <h1 class="heading-main">
                            <small>Join Us</small>
                            Reach Out & Support Us In Our Mission 
                        </h1>
                    </div>
                    
                </div>
                <style>
                    .event-carousel img{
                        height: 300px ;
                        object-fit: cover;
                    }
                </style>
                <div class="owl-carousel owl-theme event-carousel" id="home-second-events">
                
                    <!-- Events Alternate Wrap -->
                     @foreach($allEvent as $allEventVal)
                    <div class="item">
                        <div class="event-wrap-alternate">
                            <!-- Event Wrap -->
                            <div class="img-wrap">
                                <div class="date-box">
                                {{ \Carbon\Carbon::parse($allEventVal['start_date'])->format('d')}} <span>{{ \Carbon\Carbon::parse($allEventVal['start_date'])->format('M')}}</span>
                                </div>
                                <a href="{{route('event-details',$allEventVal->slug)}}">
                                    <img src="{{asset('storage/'.$allEventVal->banner)}}" alt="">
                                </a>
                                <div class="content-wrap">
                                    <h3><a href="{{route('event-details',$allEventVal->slug)}}">{{$allEventVal['title']}}</a></h3>
                                    <div class="event-details">
                                        <div><i data-feather="clock"></i> {{$allEventVal['e_time']}}</div>
                                        <div><i data-feather="map-pin"></i> {{$allEventVal['address']}}</div>
                                    </div>
                                </div>
                            </div>                            
                            <!-- Event Wrap -->
                        </div>
                    </div>
                    @endforeach
                    <!-- Events Alternate Wrap -->
                </div>
                <div class="text-center mt-5">
                    <a href="{{route('events')}}" class="btn btn-outline-dark">View All Events</a>
                </div>
            </div>
        </section>
        <!-- Event Style End -->
        <!-- Testimonials Style Start -->
        <section class="wide-tb-100 pattern-green pb-0 home-second-testimonials-wrap">
            <div class="container">
                <h1 class="heading-main light-mode green">
                    <small>Our Testimonials</small>
                    What People Say
                </h1>
                <div class="owl-carousel owl-theme nav-light" id="home-second-testimonials">
                        
                    <!-- Client Testimonials Alternate Slider Item -->
                    @foreach($testimonial as $testimonialVal)
                    <div class="item">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-md-11 mx-auto">
                                    <div class="client-testimonial-alternate">
                                        <div class="client-inner-content">
                                            <i class="charity-quotes"></i>
                                            <p>{{$testimonialVal->description}} </p>
                                        </div>
                                        <div class="client-testimonial-icon">
                                            <img src="{{asset('storage/'.$testimonialVal->profile_img)}}" alt="">
                                            <div class="text">
                                                <div class="name">{{$testimonialVal->name}}</div>
                                                <div class="post">{{$testimonialVal->designation}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    @endforeach
                    <!-- Client Testimonials Alternate Slider Item -->
                </div>
            </div>
        </section>
        <!-- Testimonials Style End -->          

        <!-- Blog Style Start -->
        <section class="wide-tb-100 pb-0 bg-white shadow">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6 col-9">
                        <h1 class="heading-main">
                            <small>News & Blogs</small>
                            Some Of Our Recent Stories & News Blog
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="home-second-blog-post">
                            <!-- Blog Post Slider Item -->
                            @foreach($allBlog as $allBlogVal)
                            <div class="item">
                                <div class="post-wrap">
                                    <div class="post-img">
                                        <a href="{{route('details',$allBlogVal->slug)}}"><img src="{{asset('storage/'.$allBlogVal->bgimage)}}" alt=""></a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-date">{{ \Carbon\Carbon::parse($allBlogVal->start_date)->format('d M Y')}}</div>
                                        <h3 class="post-title"><a href="{{route('details',$allBlogVal->slug)}}">{{$allBlogVal->title}}</a></h3>
                                        <div class="post-category">{{ucfirst($allBlogVal->category)}}</div>
                                        <div class="text-md-right">
                                            <a href="{{route('details',$allBlogVal->slug)}}" class="read-more-line"><span>Read More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Blog Post Slider Item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Style End -->   
      <!-- Our Partners Start -->
      @include('front.includes.new_partner')
        <!-- Our Partners End -->
    </main>

   @include('front.includes.new_footer')