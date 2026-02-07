<section class="wide-tb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h1 class="heading-main">
                            <small>Global Providers</small>
                            Our World Wide Partner
                        </h1>
                    </div>
                    <div class="col-sm-12">
                        <div class="owl-carousel owl-theme" id="home-clients">
                            <!-- Client Logo -->
                             @foreach($partners as $partnersVal)
                            <div class="item">
                                <div class="clients-logo">
                                    <img src="{{url('/')}}/{{$partnersVal->logo}}" alt="">
                                </div>
                            </div>
                            @endforeach
                            <!-- Client Logo -->
                        </div>
                    </div>
                </div>
            </div>
        </section>