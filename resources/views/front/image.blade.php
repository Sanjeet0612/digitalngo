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
                        <li class="btn btn-outline-dark active" data-filter="*">All</li>
                        <li class="btn btn-outline-dark" data-filter=".plant">Plant Distribution</li>
                        <li class="btn btn-outline-dark" data-filter=".planting">Planting</li>
                        <li class="btn btn-outline-dark" data-filter=".drink">Water distribution</li>
                        <li class="btn btn-outline-dark" data-filter=".puja">Special Events</li>
                        <li class="btn btn-outline-dark" data-filter=".education">Education</li>
                        <li class="btn btn-outline-dark" data-filter=".cow">Cow savaya</li>
                        </ul></center>
                    </div>
                    <div class="portfolio-item row">
                    <?php
                        /*$query = mysqli_query($con,"select * from gallery order by id desc");
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_array($query)){
                                    $id = $row['id'];
                                    $image = $row['image'];
                                    $title = $row['title'];
                                    $date = $row['date'];
                        */
                        ?>  
                        <div class="item <?php //echo $title; ?> col-lg-3 col-md-4 col-6 col-sm">
                        <a href="{{url('/')}}/front/assets/images/gallery/<?php //echo $image; ?>" class="fancylight popup-btn" data-fancybox-group="light"> 
                        <img class="img-fluid" src="{{url('/')}}/front/assets/images/gallery/<?php //echo $image; ?>" alt="">
                        </a>
                        </div>
                        <?php //} } ?>
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