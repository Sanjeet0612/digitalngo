@include('front.includes.new_header')

     <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Explore Causes</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Explore Causes</li>
                    </ol>
                </nav>  
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->
    
    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Causes Grid Start -->
        <section class="wide-tb-100">
            <div class="container">
                <h1 class="heading-main">
                    <small>Help Us Now</small>
                    More Recent Causes
                </h1>
                <div class="row"> 
                    @foreach($allCauses as $allCausesVal) 
                    
                        @php
                            $percent = ($allCausesVal->tot_amt > 0)
                                ? ($allCausesVal->received_amt / $allCausesVal->tot_amt) * 100
                                : 0;

                            // 100% se zyada na ho
                            $percent = min(100, round($percent));
                        @endphp
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <!-- Causes Wrap -->
                        <div class="causes-wrap">
                            <div class="img-wrap">
                                <a href="{{route('causes',$allCausesVal->slug)}}"><img src="{{asset('storage/'.$allCausesVal->banner)}}" alt=""></a>
                                <div class="raised-progress">
                                    <div class="skillbar-wrap">
                                        <div class="clearfix">
                                            &#8377;{{$allCausesVal->received_amt}} raised of &#8377;{{$allCausesVal->tot_amt}}
                                        </div>
                                        <div class="skillbar" data-percent="{{$percent}}%">
                                            <div class="skillbar-percent">{{$percent}}%</div>
                                            <div class="skillbar-bar"></div>
                                        </div>             
                                    </div>
                                </div>
                            </div>

                            <div class="content-wrap">
                                <span class="tag">{{ucfirst($allCausesVal->couses_cat_name)}}</span>
                                <h3><a href="{{route('causes',$allCausesVal->slug)}}">{{$allCausesVal->title}}</a></h3>
                                <p>{!! \Illuminate\Support\Str::limit(strip_tags($allCausesVal->description), 80) !!}</p>
                                <div class="btn-wrap">
                                    <a class="btn-primary btn" href="{{route('causes_donation',$allCausesVal->slug)}}">Donate Now</a>
                                </div>
                            </div>

                        </div>
                        <!-- Causes Wrap -->
                    </div>
                    @endforeach

                   
                </div>
            </div>
        </section>
        <!-- Causes Grid Start -->

        <!-- Featured Cause Start -->
        <section class="wide-tb-150 bg-white featured-heart-icon-hidden">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="featured-causes-img">
                            <img src="{{url('/')}}/front/assets/images/causes/featured_cause.jpg" alt="">
                            <div class="featured-cause-timer">
                                <h3><strong class="txt-orange">₹21,864</strong> pledged of <strong class="txt-blue">₹500,000</strong></h3>
                                <div class="skillbar" data-percent="70%">
                                    <div class="skillbar-bar"></div>
                                </div>   
                                <ul id="featured-cause" class="list-unstyled list-inline" data-end-date="2026-02-15">
                                    <li class="list-inline-item"><span class="days">00</span><div class="days_text">Days</div></li>
                                    <li class="list-inline-item"><span class="hours">00</span><div class="hours_text">Hours</div></li>
                                    <li class="list-inline-item"><span class="minutes">00</span><div class="minutes_text">Minutes</div></li>
                                    <li class="list-inline-item"><span class="seconds">00</span><div class="seconds_text">Seconds</div></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="featured-content">
                            <div class="featured-heart-icon"><i class="charity-hearts"></i></div>
                            <h1 class="heading-main">
                                <small>Featured Cause</small>
                                Emergency Relief Donations for a Mass Marriage
                            </h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <a href="donation-page.html" class="btn btn-default">Donate Now</a>
                                <div class="share-on-text">
                                    <strong>Share On</strong> <a href="#"><img src="assets/images/facebook.svg" alt=""></a> <a href="#"><img src="assets/images/instagram.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured Cause End -->
         <!-- Our Partners Start -->
        @include('front.includes.new_partner')
        <!-- Our Partners End -->
    </main>
    <!-- Main Footer Start -->
@include('front.includes.new_footer')

 <script>
document.addEventListener("DOMContentLoaded", function () {

    const timer = document.getElementById('featured-cause');
    if (!timer) return;

    const endDate = timer.getAttribute('data-end-date');
    const countDownDate = new Date(endDate + " 23:59:59").getTime();

    const daysEl = timer.querySelector('.days');
    const hoursEl = timer.querySelector('.hours');
    const minutesEl = timer.querySelector('.minutes');
    const secondsEl = timer.querySelector('.seconds');

    const interval = setInterval(function () {

        const now = new Date().getTime();
        const distance = countDownDate - now;

        if(distance < 0) {
            clearInterval(interval);
            daysEl.innerHTML = "00";
            hoursEl.innerHTML = "00";
            minutesEl.innerHTML = "00";
            secondsEl.innerHTML = "00";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        daysEl.innerHTML = days < 10 ? '0' + days : days;
        hoursEl.innerHTML = hours < 10 ? '0' + hours : hours;
        minutesEl.innerHTML = minutes < 10 ? '0' + minutes : minutes;
        secondsEl.innerHTML = seconds < 10 ? '0' + seconds : seconds;

    }, 1000);
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.skillbar').forEach(function (bar) {
        let percent = bar.getAttribute('data-percent');
        bar.querySelector('.skillbar-bar').style.width = percent;
    });
});
</script>