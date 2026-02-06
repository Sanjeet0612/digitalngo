@include('front.includes.new_header')
<style>
    .gradient-icon {
    font-size: 120px;
    background: linear-gradient(45deg, #ff5722, #2196f3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
          <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Function & Features</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Function & Features</li>
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
                
                <div class="row">
                     <!-- Team Column One -->
                    @foreach($allFeature as $allFeatureVal)
                        <div class="col-12 col-lg-4 col-sm-4">
                            <div class="team-section-wrap d-flex flex-column align-items-center text-center p-3">
                                <!--<i class="icofont-id-card gradient-icon mb-3" style="font-size:60px;"></i>-->
                                <img src="{{url('/')}}/{{$allFeatureVal->icon_img}}" style="width:60px;">
                                <h4 class="mb-2">{{$allFeatureVal->title}}</h4>
                                <p class="mb-3">{!! $allFeatureVal->description !!}</p>
                                <a href="" class="btn mb-3" style="color:#fff;background-color:#D59B2D;border-color: #D59B2D;">Demo Book Now</a>
                                <small>Call / WhatsApp On +91 {{$allFeatureVal->phone}}</small>
                            </div>
                        </div>
                    @endforeach
                    
                    <!-- Team Column One -->
                    
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->   
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

  <!-- Main Footer Start -->

@include('front.includes.new_footer')