@include('front.includes.new_header')
     <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Mahror Foundation Events</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mahror Foundation Events</li>
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
                    <small>Help Us Now</small>
                    {{$eventDetail['title']}}
                   
                </h1>

                <div class="events-single-img">
                    <img src="{{asset('storage/'.$eventDetail['banner'])}}" alt="">                    
                </div>
            </div>

            
            <div class="event-single-wrap">
                <div class="container pos-rel">                
                    <div class="row">
                        <div class="col-lg-3 order-lg-last">
                            <div class="event-single-listing pattern-green">
                                <h3>Event Info</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <div><i data-feather="calendar"></i> </div>
                                        <div>{{ \Carbon\Carbon::parse($eventDetail['start_date'])->format('d M Y')}}</div>
                                    </li>
                                    <li>
                                        <div><i data-feather="clock"></i> </div>
                                        <div> {{$eventDetail['e_time']}}</div>
                                        
                                    </li>
                                    <li>
                                        <div><i data-feather="map-pin"></i> </div>
                                        <div>{{$eventDetail['address']}}</div>
                                    </li>
                                </ul>
                            </div>

                            <div class="event-single-listing pattern-orange">
                                <h3>Organizer</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <div><i data-feather="user"></i> </div>
                                        <div>{{$eventDetail['og_name']}}</div>
                                    </li>
                                    <li>
                                        <div><i data-feather="phone"></i> </div>
                                        <div><a href="tel:02-235-235-2365">{{$eventDetail['og_phone']}}</a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="mail"></i> </div>
                                        <div><a href="mailto:{{$eventDetail['og_email']}}">{{$eventDetail['og_email']}}</a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="globe"></i> </div>
                                        <div><a href="{{$eventDetail['og_weblink']}}" target="_blank">{{$eventDetail['og_weblink']}}</a></div>
                                    </li>                                    
                                </ul>
                            </div>

                            <div class="event-single-listing pattern-green">
                                <h3>Sponsor Info</h3>
                                @foreach($sponsors as $sponsorsVal)
                                <ul class="list-unstyled">
                                    <li>
                                        <div><i data-feather="user"></i> </div>
                                        <div>{{$sponsorsVal['name']}}</div>
                                    </li>
                                    <li>
                                        <div><i data-feather="phone"></i> </div>
                                        <div><a href="tel:02-235-235-2365">{{$sponsorsVal['phone']}}</a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="mail"></i> </div>
                                        <div><a href="mailto:{{$sponsorsVal['email']}}">{{$sponsorsVal['email']}}</a></div>
                                    </li>
                                    @if(!empty($sponsorsVal['website']))
                                    <li>
                                        <div><i data-feather="globe"></i> </div>
                                        <div><a href="{{$sponsorsVal['website']}}" target="_blank">{{$sponsorsVal['website']}}</a></div>
                                    </li> 
                                    @endif
                                </ul><hr>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="event-single-info">
                                <div class="map-wrap">
                                    {!!$eventDetail['location']!!}
                                </div>

                                <p> {!! $eventDetail['description'] !!}</p>
                                     </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Style Start -->
        <!-- Images Gallery Style Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row img-gallery">                    
                    <div class="col-lg-4">
                        <h1 class="heading-main mb-lg-0">
                            <small>Event Gallery</small>
                            Project We Have Done
                        </h1>
                    </div>
                   @foreach($eventGallery as $eventGalleryVal)
                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="{{asset('storage/'.$eventGalleryVal['image'])}}" title="School Development">
                                <div class="gallery-content">
                                    <!-- <div class="tag"><span>Education</span></div>
                                    <h3>School Development</h3> -->
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="{{asset('storage/'.$eventGalleryVal['image'])}}" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>
                   @endforeach
                </div>
            </div>
        </section>
        <!-- Images Gallery Style End -->
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