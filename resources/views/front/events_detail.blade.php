@include('front.includes.new_header')
     <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Mahror Foundation Events</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                    <?php echo $row_event['e_title']; ?>
                   
                </h1>

                <div class="events-single-img">
                    <img src="assets/images/events/<?php echo $row_event['e_image']; ?>" alt="">                    
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
                                        <div><?php echo date_format($date,"d-M-Y");?></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="clock"></i> </div>
                                        <div> <?php echo $row_event['e_time']; ?></div>
                                        
                                    </li>
                                    <li>
                                        <div><i data-feather="map-pin"></i> </div>
                                        <div><?php echo $row_event['e_location']; ?></div>
                                    </li>
                                </ul>
                            </div>

                            <div class="event-single-listing pattern-orange">
                                <h3>Organizer</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <div><i data-feather="user"></i> </div>
                                        <div><?php echo $row_event['e_og_anme']; ?></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="phone"></i> </div>
                                        <div><a href="tel:02-235-235-2365"><?php echo $row_event['e_og_mobile']; ?></a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="mail"></i> </div>
                                        <div><a href="mailto:Info@orion.com"><?php echo $row_event['e_og_email']; ?></a></div>
                                    </li>
                                    <li>
                                        <div><i data-feather="globe"></i> </div>
                                        <div><a href="#"><?php echo $row_event['e_og_website']; ?></a></div>
                                    </li>                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="event-single-info">
                                <div class="map-wrap">
                                    <?php echo $row_event['e_location_map']; ?>
                                   
                                </div>

                                <p> <?php echo $row_event['e_details']; ?></p>
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
                    <?php
                        $query = mysqli_query($con,"select * from event_gallery where eg_e_id='$pac_id' order by eg_id");
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_array($query)){
                                    $eg_id = $row['eg_id'];
                                    $image = $row['eg_image'];
                        
                        ?> 
                    <div class="col-lg-4 col-md-6">
                        <!-- Gallery Item -->
                        <div class="img-gallery-item">
                            <a href="assets/images/events/<?php echo $image; ?>" title="School Development">
                                <div class="gallery-content">
                                    <!-- <div class="tag"><span>Education</span></div>
                                    <h3>School Development</h3> -->
                                    <div class="img-open">
                                        <i data-feather="plus-circle"></i>
                                    </div>
                                </div>
                                <img src="assets/images/events/<?php echo $image; ?>" alt="">
                            </a>
                        </div>
                        <!-- Gallery Item -->
                    </div>
                    <?php } } ?>
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