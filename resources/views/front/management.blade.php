@include('front.includes.new_header')
    <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Our Management Teams</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Volunteers</li>
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
                <h1 class="heading-main">
                    <small>Team Member</small>
                    Management Teams
                </h1>
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
        <!-- About Us Style Start -->

        <!-- Governing Us Style Start -->
        <section class="wide-tb-0">
            <div class="container">
                <h1 class="heading-main">
                    <small>Team Member</small>
                    Governing Board Teams
                </h1>
                <div class="row">
                    <!-- Team Column One -->
                    @foreach($allgoverning as $allgoverningVal)
                    <div class="col-12 col-lg-3 col-sm-6">
                        <div class="team-section-wrap">
                            <div class="img green">
                                <div class="social-icons">
                                    <a href="{{$allgoverningVal->fb_link}}" target="_blank"><i class="icofont-facebook"></i></a>
                                    <a href="{{$allgoverningVal->twt_link}}" target="_blank"><i class="icofont-twitter"></i></a>
                                    <a href="{{$allgoverningVal->insta_link}}" target="_blank"><i class="icofont-instagram"></i></a>
                                </div>
                                <img src="{{asset('storage/'.$allgoverningVal->profile_img)}}" alt="" class="rounded-circle">
                            </div>
                            <h4>{{$allgoverningVal->m_name}}</h4>
                            <h5>{{$allgoverningVal->designation}}</h5>
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
       
        <!-- Team Member Style Start -->
        <section class="wide-tb-100 mb-spacer-md pb-0">
            <div class="container">
            </div>
        </section>
        <!-- Team Member Style End -->

        <!-- Faq's Style Start -->
        <section class="wide-tb-100 pattern-orange pt-0 mb-spacer-md">
            <div class="container">
                <div class="row d-flex align-items-center" style="padding-top: 80px;">
                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">
                            <div class="counter-txt"><span class="counter">180</span>+</div>
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
                            <div class="counter-txt"><span class="counter">250</span>+</div>
                            <div>Dedicated Volunteers</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->

                    <!-- Counter Col Start -->
                    <div class="col col-12 col-lg-3 col-sm-6">
                        <div class="counter-style-box">     
                            <div class="counter-txt"><span class="counter">1530</span>+</div>
                            <div>People Helped Happily</div>
                        </div>
                    </div>
                    <!-- Counter Col End -->
                </div>
            </div>
        </section>
        <!-- Faq's Style End -->

      <!-- Our Partners Start -->
      @include('front.includes.new_partner')
        <!-- Our Partners End -->
        
           
    </main>


@include('front.includes.new_footer')