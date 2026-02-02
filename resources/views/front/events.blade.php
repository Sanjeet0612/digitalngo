@include('front.includes.new_header')
<style>
    a[data-toggle="modal"] {
    position: relative; /* ensures above background */
    z-index: 1000;      /* above most other elements */
    pointer-events: auto; 
    display: inline-block; /* ensures width-height */
}
.modal-body iframe {
    width: 100%;      /* full width of modal body */
    height: 200px;    /* adjust height as needed */
    border: 0;        /* remove border */
}
</style>    
            <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Our Events</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Events</li>
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
                <div class="row row-cols-1 row-cols-md-2 row-cols-sm-1">
                    @foreach($event as $eventVal)
                    <div class="col mb-5">
                        <div class="event-wrap">
                            <!-- Event Wrap -->
                            <div class="img-wrap">
                                <a href="{{route('event-details',$eventVal->slug)}}"><img src="{{asset('storage/'.$eventVal->banner)}}" alt=""></a>
                            </div>
                            <div class="content-wrap">
                                <div class="date-wrap d-lg-flex align-items-end">
                                    <div class="date-box" style="font-size:29px;">
                                        <center>{{ \Carbon\Carbon::parse($eventVal->start_date)->format('d M Y')}}</center>
                                    </div>
                                    <div class="event-details">
                                        <div><i data-feather="clock"></i> {{$eventVal->e_time}}</div>
                                        <div>
                                            <a href="javascript:void(0)"
                                            data-toggle="modal"
                                            data-target="#mapModal{{$eventVal->id}}"
                                             style="display:inline-block; cursor:pointer">
                                                <i data-feather="map-pin"></i> {{ $eventVal->address }}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Map POPUP -->
                                    <div class="modal fade" id="mapModal{{$eventVal->id}}" tabindex="-1">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <!-- Remove the modal-header block -->
                                                
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Location Map</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                            <div class="modal-body p-0">
                                                {!! $eventVal->location !!}<span>
                                            </div>

                                            </div>
                                        </div>
                                    </div><!-- Map POPUP CLOSE -->
                                </div>
                                <h3><a href="{{route('event-details',$eventVal->slug)}}">{{ $eventVal->title }}</a></h3>
                            </div>
                            <div class="text-md-right read-more-wrap">
                                <a href="{{route('event-details',$eventVal->slug)}}" class="read-more-line"><span>Read More</span></a>
                            </div>
                            <!-- Event Wrap -->
                        </div>
                    </div>
                    @endforeach

                   
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
                            We Dream to Create A Bright Future Of The Children
                        </h1>
                    </div>
                    <div class="col-sm-12 text-md-right">
                        <a href="donation-page.php" class="btn btn-default">Donate Now</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
</script>