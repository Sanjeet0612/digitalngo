@include('front.includes.new_header')

         <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Our Gallery</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Our Gallery</li>
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
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="portfolio-menu mt-2 mb-4">
                        <center><ul>
                        @foreach($allCat as $allCatVal)
                            <li class="btn btn-outline-dark {{ $loop->first ? 'active' : '' }}"
                                data-filter="{{ $loop->first ? '*' : '.cat-'.$allCatVal->id }}">
                                {{ $allCatVal->cat_name }}
                            </li>
                        @endforeach
                        </ul></center>
                    </div>
                    <div class="portfolio-item row">
                   
                        @foreach($gallImg as $gallImgVal)
    <div class="item cat-{{ $gallImgVal->cat_id }} col-lg-3 col-md-4 col-6 col-sm">
        <a href="{{ asset('storage/'.$gallImgVal->path) }}"
           class="fancylight popup-btn"
           data-fancybox="gallery">

            @if($gallImgVal->gtype === 'photo')
                <img class="img-fluid"
                     src="{{ asset('storage/'.$gallImgVal->path) }}"
                     alt="">
            @else
                <video class="img-fluid" controls>
                    <source src="{{ asset('storage/'.$gallImgVal->path) }}" type="video/mp4">
                </video>
            @endif

        </a>
    </div>
@endforeach
                       
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
@include('front.includes.new_footer')


    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {

    var grid = document.querySelector('.portfolio-item');

    var iso = new Isotope(grid, {
        itemSelector: '.item',
        layoutMode: 'fitRows'
    });

    // filter on click
    var filtersElem = document.querySelector('.portfolio-menu');

    filtersElem.addEventListener('click', function (event) {
        if (!event.target.matches('li')) {
            return;
        }

        var filterValue = event.target.getAttribute('data-filter');
        iso.arrange({ filter: filterValue });

        // active class toggle
        filtersElem.querySelectorAll('li').forEach(li => li.classList.remove('active'));
        event.target.classList.add('active');
    });

});
</script>