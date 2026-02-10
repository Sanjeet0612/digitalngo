@include('front.includes.new_header')
        <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>About Us</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>  
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- About Us Style Start -->
        <section class="wide-tb-100">
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
                            Let's Take A Step Towards A Better Tommrow
                        </h1>

                        <p>Environment is an important factor for an healty life and for better living as it has a direct impact on all of us. Lets take a step forward and pledge to make this Environment as best as we can. Mahror foundation has took a initiative to contribute in making our planet more better and healthier. We are a team who is working together towards environmental wellness we are planting trees and hope to inspire more people to join in this effort of keeping our planet healthy and green. For any query reach out to us we will be glad to help you.</p>

                        <div class="icon-box-1 my-4">
                            <i class="charity-volunteer_people"></i>
                            <div class="text">
                                <h3>Work As An Intern</h3>
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

        <!-- Get to Know Us Style Start -->
        <section class="wide-tb-100 bg-white mb-spacer-md">
            <div class="container">
                <div class="row">                    
                    <div class="col-lg-5 col-md-12">
                        <h1 class="heading-main">
                            <small>Get to Know Us</small>
                            Let Pledge For A Greener Planet
                        </h1>

                        <p>If you want to join hands or want to help us in this initiative feel free to contact us we will be glad to have you in our team and this journey where we want to contribute to the society.</p>

                        <!-- Animated Skillbars Start -->
                        <div class="skillbar-wrap">
                            <div class="clearfix">
                                Cleaning Works
                            </div>
                            <div class="skillbar" data-percent="67%">
                                <div class="skillbar-percent">67%</div>
                                <div class="skillbar-bar"></div>
                            </div>             
                        </div>
                        <!-- Animated Skillbars Start -->

                        <!-- Animated Skillbars Start -->
                        <div class="skillbar-wrap">
                            <div class="clearfix">
                                Water Distribution
                            </div>
                            <div class="skillbar" data-percent="85%">
                                <div class="skillbar-percent">85%</div>
                                <div class="skillbar-bar"></div>
                            </div>             
                        </div>
                        <!-- Animated Skillbars Start -->
                    </div>
                    
                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <div class="col-lg-7 col-md-12">
                        <!-- Theme Tabbing Style -->
                        <ul class="nav nav-pills theme-tabbing mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-mission-tab" data-toggle="pill" href="#pills-mission" role="tab" aria-controls="pills-mission" aria-selected="true">Mission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-vision-tab" data-toggle="pill" href="#pills-vision" role="tab" aria-controls="pills-vision" aria-selected="false">Our Vision</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">Our History</a>
                            </li>
                        </ul>
                        <div class="tab-content theme-tabbing" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab">                                
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="about-img-small">
                                            <img src="{{url('/')}}/front/assets/images/about_img_2.jpg" class="about-us-2" alt="">
                                            <div class="since-year">
                                                <span>Since</span>
                                                1
                                                <span class="text-right">Years</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            <li>Planting Trees</li>
                                            <li>Cleaning Works</li>
                                            <li>Water Distribution</li>
                                            <li>Spreading Environmental Awareness</li>
                                            <li>Installing Garbage Containers</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="pills-vision-tab">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="about-img-small">
                                            <img src="{{url('/')}}/front/assets/images/about_img_2.jpg" class="about-us-2" alt="">
                                            <div class="since-year">
                                                <span>Since</span>
                                                1
                                                <span class="text-right">Years</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            <li>Greener Earth</li>
                                            <li>Clean Surroundings</li>
                                            <li>Clean Water</li>
                                            <li>Healthy Air</li>
                                            <li>Healthy Environment</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="about-img-small">
                                            <img src="{{url('/')}}/front/assets/images/about_img_2.jpg" class="about-us-2" alt="">
                                            <div class="since-year">
                                                <span>Since</span>
                                                1
                                                <span class="text-right">Years</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">
                                            <li>Tress Plantation</li>
                                            <li>Water Distribution During Summer</li>
                                            <li>Cleaning Works</li>
                                            <li>Proving Environmental Awarness In Schools</li>
                                            <li>Saplings Distribution At Schools</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Theme Tabbing Style -->
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Get to Know Us Style End -->

        <!-- Team Member Style Start -->
        <section class="wide-tb-100 team-bg mb-spacer-md">
            <div class="container">
                <div class="row justify-content-between align-items-end">
                    <div class="col-lg-4 col-md-6">
                        <h1 class="heading-main">
                            <small>Team Member</small>
                            Management Teams
                        </h1>
                    </div>
                    <div class="col-lg-8 col-md-6 text-md-right btn-team">
                        <a href="{{route('management')}}" class="btn btn-outline-dark">View All Members</a>
                    </div>
                </div>

                <div class="row">
                    <!-- Team Column One -->
                     @foreach($allManagement as $allManagementVal)
                    <div class="col-12 col-lg-3 col-sm-6">
                        <div class="team-section-wrap">
                            <div class="img green">
                                <div class="social-icons">
                                    <a href="{{$allManagementVal->fb_link}}" target="_blank"><i class="icofont-facebook"></i></a>
                                    <a href="{{$allManagementVal->twt_link}}" target="_blank"><i class="icofont-twitter"></i></a>
                                    <a href="{{$allManagementVal->insta_link}}" target="_blank"><i class="icofont-instagram"></i></a>
                                </div>
                                <img src="{{asset('storage/'.$allManagementVal->profile_img)}}" alt="" class="rounded-circle">
                            </div>
                            <h4>{{$allManagementVal->m_name}}</h4>
                            <h5>{{$allManagementVal->designation}}</h5>
                            <div class="text-md-right">
                                <a href="javascript:" class="read-more-line"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Team Column One -->
                </div>
            </div>
        </section>
        <!-- Team Member Style End -->

        <!-- Faq's Style Start -->
        <section class="wide-tb-100 pattern-orange pt-0 mb-spacer-md">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        
                        <div class="faqs-wrap pos-rel">
                            <div class="bg-overlay blue opacity-80"></div>
                            <div class="row">
                                <div class="col-12 col-lg-6 col-md-12">
                                    <h1 class="heading-main light-mode">
                                        <small>Who We Are</small>
                                        Mahror Foundation 
                                    </h1>
                                    <p>Mahror foundation was started in 2022 with a initiative to contribute in making our planet more better and healthier. We are a team who is working together towards environmental wellness we are planting trees and hope to inspire more people to join in this effort of keeping our planet healthy and green. For any query reach out to us we will be glad to help you.</p>
                                    <a class="btn btn-default" href="{{route('our-faqs')}}">Ask It Now</a>
                                </div>
        
                                <!-- Spacer For Medium -->
                                <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                                <!-- Spacer For Medium -->
        
                                <div class="col-12 col-lg-6 col-md-12">
                                    <div class="theme-collapse light">
                                        <!-- Toggle Links 1 -->
                                        <div class="toggle arrow-down">
                                            <span class="icon">
                                                <i class="icofont-plus"></i>
                                            </span> Our Documents
                                        </div>
                                        <!-- Toggle Links 1 -->
                
                                        <!-- Toggle Content 1 -->
                                        <div class="collapse show">
                                            <div class="content">
                                               <a href=""> <h4 style="color: white;">1. Certificate of Incorporation</h4></a><br>
                                               <a href=""><h4 style="color: white;"> 2. Section 8 Certificate</h4></a><br>
                                               <a href=""><h4 style="color: white;"> 3. PAN & TAB</h4></a><br>
                                               <a href=""><h4 style="color: white;"> 4. 80G & 12AA Certificate</h4></a><br>
                                               <a href=""><h4 style="color: white;"> 5. Darpan Certificate</h4></a><br>
                                               <a href=""><h4 style="color: white;"> 6. CSR Certificate</h4></a><br>
                                            </div>
                                        </div>
                                        <!-- Toggle Content 1 -->
                
                                        <!-- Toggle Links 2 -->
                                        <div class="toggle">
                                            <span class="icon">
                                                <i class="icofont-plus"></i>
                                            </span> Payment Details
                                        </div>
                                        <!-- Toggle Links 2 -->
                
                                        <!-- Toggle Content 2 -->
                                        <div class="collapse">
                                            <div class="content">
                                               Bank Name :  HDFC Bank <br>
                                               Name : Mahror Foundation </br>
                                               Account Number : 50200075850824<br>
                                               IFSC Code : HDFC0009562
                                            </div>
                                        </div>
                                        <!-- Toggle Content 2 -->
                
                                        <!-- Toggle Links 3 -->
                                        <div class="toggle">
                                            <span class="icon">
                                                <i class="icofont-plus"></i>
                                            </span> Know More About Adoption
                                        </div>
                                        <!-- Toggle Links 3 -->
                
                                        <!-- Toggle Content 3 -->
                                        <div class="collapse">
                                            <div class="content">
                                                Mobile : 8478884111 <br>
                                                Email : info@mahrorfoundation.com<br>
                                                Email : donation@mahrorfoundation.com
                                            </div>
                                        </div>
                                        <!-- Toggle Content 3 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex align-items-center">
                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">5</span>+</div>
                            <div>Featured Campaign</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">               
                            <div class="counter-txt"><span class="counter">7120</span>+</div>
                            <div>Money Raised</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Spacer For Medium -->
                    <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                    <!-- Spacer For Medium -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">100</span>+</div>
                            <div>Dedicated Volunteers</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">     
                            <div class="counter-txt"><span class="counter">51</span>+</div>
                            <div>People Helped Happily</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->
                </div>
            </div>
        </section>
        <!-- Faq's Style End -->

        <!-- Testimonials Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main">
                    <small>Our Testimonials</small>
                    What People Say
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme" id="home-client-testimonials">
                        
                            <!-- Client Testimonials Slider Item -->
                            <div class="item">
                                <div class="client-testimonial">
                                    <div class="client-inner-content">
                                        <i class="charity-quotes"></i>
                                        <p>Gracious is a nonproﬁt organization supported by community leaders, corporate sponsors, churches,
                                            helpless etc. and concerned citizens</p>
                                    </div>
                                    <div class="client-testimonial-icon">
                                        <img src="{{url('/')}}/front/assets/images/team_1.jpg" alt="">
                                        <div class="text">
                                            <div class="name">Josefin Fashkin</div>
                                            <div class="post">Senior Activist</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Client Testimonials Slider Item -->
                        
                            <!-- Client Testimonials Slider Item -->
                            <div class="item">
                                <div class="client-testimonial">
                                    <div class="client-inner-content">
                                        <i class="charity-quotes"></i>
                                        <p>Gracious is a nonproﬁt organization supported by community leaders, corporate sponsors, churches,
                                            helpless etc. and concerned citizens</p>
                                    </div>
                                    <div class="client-testimonial-icon">
                                        <img src="{{url('/')}}/front/assets/images/team_2.jpg" alt="">
                                        <div class="text">
                                            <div class="name">Josefin Fashkin</div>
                                            <div class="post">Senior Activist</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Client Testimonials Slider Item -->
                        
                            <!-- Client Testimonials Slider Item -->
                            <div class="item">
                                <div class="client-testimonial">
                                    <div class="client-inner-content">
                                        <i class="charity-quotes"></i>
                                        <p>Gracious is a nonproﬁt organization supported by community leaders, corporate sponsors, churches,
                                            helpless etc. and concerned citizens</p>
                                    </div>
                                    <div class="client-testimonial-icon">
                                        <img src="{{url('/')}}/front/assets/images/team_3.jpg" alt="">
                                        <div class="text">
                                            <div class="name">Josefin Fashkin</div>
                                            <div class="post">Senior Activist</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Client Testimonials Slider Item -->
                        
                            <!-- Client Testimonials Slider Item -->
                            <div class="item">
                                <div class="client-testimonial">
                                    <div class="client-inner-content">
                                        <i class="charity-quotes"></i>
                                        <p>Gracious is a nonproﬁt organization supported by community leaders, corporate sponsors, churches,
                                            helpless etc. and concerned citizens</p>
                                    </div>
                                    <div class="client-testimonial-icon">
                                        <img src="{{url('/')}}/front/assets/images/team_1.jpg" alt="">
                                        <div class="text">
                                            <div class="name">Josefin Fashkin</div>
                                            <div class="post">Senior Activist</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Client Testimonials Slider Item -->
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials Style End -->

        <!-- Callout Style Start -->
        <section class="wide-tb-150 bg-scroll bg-img-6 pos-rel callout-style-1">
            <div class="bg-overlay blue opacity-80"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="heading-main light-mode">
                            <small>Help Other People</small>
                            We Dream to Create A Bright Future Of The Children
                        </h1>
                    </div>
                    <div class="col-sm-12 text-md-right">
                        <a href="{{route('donation')}}" class="btn btn-default">Donate Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Style End -->
         <!-- Our Partners Start -->
      @include('front.includes.new_partner')
        <!-- Our Partners End -->
    </main>
@include('front.includes.new_footer')