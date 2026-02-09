
@include('front.includes.new_header')
 <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>{{$causesDetail->title}}</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Causes {{$causesDetail->title}}</li>
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
                    <div class="col-lg-9 col-md-12">
                        <div class="sidebar-spacer">
                                                    
                            <h1 class="heading-main">
                                <small>Help Us Now</small>
                                {{$causesDetail->title}}
                            </h1>
                            <!-- Causes Single Wrap -->
                            <div class="causes-wrap single">
                                <div class="img-wrap">
                                    <span class="tag-single">{{ucfirst($causesDetail->couses_cat_name)}}</span>
                                    <img src="{{asset('storage/'.$causesDetail->banner)}}" alt="">
                                </div>

                                @php
                                    $percent = ($causesDetail->tot_amt > 0)
                                        ? ($causesDetail->received_amt / $causesDetail->tot_amt) * 100
                                        : 0;

                                    // 100% se zyada na ho
                                    $percent = min(100, round($percent));
                                @endphp

                                <div class="content-wrap-single">
                                    <div class="featured-cause-timer">
                                        <h3><strong class="txt-orange">₹{{$causesDetail->received_amt}}</strong> raised of <strong class="txt-blue">₹{{$causesDetail->tot_amt}}</strong></h3>
                                        <div class="skillbar" data-percent="{{ $percent }}%">
                                            <div class="skillbar-percent"><h3><strong>{{ $percent }}%</strong></h3></div>
                                            <div class="skillbar-bar"></div>
                                        </div>
                                        <div class="d-md-flex align-items-end justify-content-between">
                                            <ul id="featured-cause"
                                                class="list-unstyled list-inline w-50"
                                                data-end-date="{{ $causesDetail->end_date }}">

                                                <li class="list-inline-item">
                                                    <span class="days">00</span>
                                                    <div class="days_text">Days</div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="hours">00</span>
                                                    <div class="hours_text">Hours</div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="minutes">00</span>
                                                    <div class="minutes_text">Minutes</div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span class="seconds">00</span>
                                                    <div class="seconds_text">Seconds</div>
                                                </li>
                                            </ul>
                                            <a class="btn-outline-default btn" href="donation-page.html">Donate Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="content-wrap-single border-top">
                                    {!!$causesDetail->description!!}
                                </div>

                                <div class="share-this-wrap">
                                    <div class="share-line">
                                        <div class="pr-4">
                                            <strong>Share This</strong>
                                        </div>
                                        <div class="pl-4">
                                            <ul class="list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i class="icofont-facebook"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icofont-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icofont-instagram"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icofont-behance"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i class="icofont-youtube-play"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Causes Single Wrap -->

                            <!-- Leave a Reply -->                            
                            <h1 class="heading-main mb-4">
                                <small>Leave a Reply</small>
                            </h1>                      

                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="Your Comments"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="d-md-flex justify-content-between align-items-center mt-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Save my name, email, and website in this browser for the next
                                            time I comment.</label>
                                    </div>
                                    <button type="submit" class="btn btn-default text-nowrap">Post Comment</button>
                                </div>
                                
                            </form>                       
                            <!-- Leave a Reply -->
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-12">
                        <aside class="row sidebar-widgets">
                            <!-- Sidebar Primary Start -->
                            <div class="sidebar-primary col-lg-12 col-md-6">
                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Recent Causes</h3>

                                    <!-- Causes Wrap -->
                                    <div class="causes-wrap">
                                        <div class="img-wrap">
                                            <a href="causes-single.html"><img src="assets/images/causes/causes_img_3.jpg" alt=""></a>
                                            <div class="raised-progress">
                                                <div class="skillbar-wrap">
                                                    <div class="clearfix">
                                                        <span class="txt-orange">$10086</span> raised of <span class="txt-green">$15000</span>
                                                    </div>           
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content-wrap">
                                            <span class="tag">Health</span>
                                            <h3><a href="causes-single.html">Supply Water For Good Health</a></h3>
                                            <div class="text-md-right">
                                                <a href="causes-single.html" class="read-more-line"><span>Read More</span></a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Causes Wrap -->

                                    <!-- Causes Wrap -->
                                    <div class="causes-wrap">
                                        <div class="img-wrap">
                                            <a href="causes-single.html"><img src="assets/images/causes/causes_img_2.jpg" alt=""></a>
                                            <div class="raised-progress">
                                                <div class="skillbar-wrap">
                                                    <div class="clearfix">
                                                        <span class="txt-orange">$10086</span> raised of <span class="txt-green">$15000</span>
                                                    </div>           
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content-wrap">
                                            <span class="tag">People</span>
                                            <h3><a href="causes-single.html">Help For Homeless People</a></h3>
                                            <div class="text-md-right">
                                                <a href="causes-single.html" class="read-more-line"><span>Read More</span></a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Causes Wrap -->

                                    <!-- Causes Wrap -->
                                    <div class="causes-wrap">
                                        <div class="img-wrap">
                                            <a href="causes-single.html"><img src="assets/images/causes/causes_img_6.jpg" alt=""></a>
                                            <div class="raised-progress">
                                                <div class="skillbar-wrap">
                                                    <div class="clearfix">
                                                        <span class="txt-orange">$10086</span> raised of <span class="txt-green">$15000</span>
                                                    </div>           
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content-wrap">
                                            <span class="tag">Health</span>
                                            <h3><a href="causes-single.html">Help From Natural
                                                Disaster</a></h3>
                                            <div class="text-md-right">
                                                <a href="causes-single.html" class="read-more-line"><span>Read More</span></a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Causes Wrap -->
                                </div>
                                <!-- Widget Wrap -->
                            </div>
                            <!-- Sidebar Primary End -->

                            <!-- Sidebar Secondary Start -->
                            <div class="sidebar-secondary col-lg-12 col-md-6">
                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Our Donators</h3>
                                    
                                    <div class="our-donators">
                                        <ul class="list-unstyled">
                                            <li>
                                                <img src="assets/images/sidebar_thumb_1.jpg" alt="">
                                                <div>
                                                    <h4 class="name">Marty Kamson</h4>
                                                    <div class="money">Raised $4500</div>
                                                </div>
                                            </li>
                                            <li>
                                                <img src="assets/images/sidebar_thumb_2.jpg" alt="">
                                                <div>
                                                    <h4 class="name">Sofia Lorence</h4>
                                                    <div class="money">Raised $2900</div>
                                                </div>
                                            </li>
                                        </ul>

                                        <a href="donation-page.html" class="btn-block btn btn-default">Become Donators</a>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->


                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Categories</h3>
                                    
                                    <div class="blog-list-categories">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">                                        
                                            <li><a href="#">Charity</a></li>
                                            <li><a href="#">Healthcare</a></li>
                                            <li><a href="#">Senior</a></li>
                                            <li><a href="#">Children Citizens</a></li>
                                            <li><a href="#">Environment</a></li>                                        
                                        </ul>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->
                            </div>
                            <!-- Sidebar Secondary End -->

                            
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->

        <!-- Callout Style Start -->
        <section class="wide-tb-150 bg-scroll bg-img-6 pos-rel callout-style-1">
            <div class="bg-overlay blue opacity-80"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h1 class="heading-main light-mode">
                            <small>Help Other People</small>
                            We Dream to Create A Bright Future Of The Underprivileged Children
                        </h1>
                    </div>
                    <div class="col-sm-12 text-md-right">
                        <a href="#" class="btn btn-default">Donate Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout Style End -->

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

        if (distance < 0) {
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