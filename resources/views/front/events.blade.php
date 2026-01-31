@include('front.includes.new_header')

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
                    <?php 
                        /*$query_events = mysqli_query($con,"select * from event order by e_id desc");
                        if(mysqli_num_rows($query_events)>0){
                            while($row=mysqli_fetch_array($query_events)){
                            $e_date = $row['e_date'];
                            $date=date_create("$e_date");*/
                    ?>
                    <div class="col mb-5">
                        <div class="event-wrap">
                            <!-- Event Wrap -->
                            <div class="img-wrap">
                                <a href="events_details.php?event=<?php //echo $row['e_id']; ?>"><img src="assets/images/events/<?php //echo $row['e_image']; ?>" alt=""></a>
                            </div>
                            <div class="content-wrap">
                                <div class="date-wrap d-lg-flex align-items-end">
                                    <div class="date-box">
                                    <?php //echo //date_format($date,"d"); ?><center><span><?php //echo date_format($date,"M");?><br><?php //echo date_format($date,"Y");?></span></center>
                                    </div>
                                    <div class="event-details">
                                        <div><i data-feather="clock"></i> <?php //echo $row['e_time']; ?></div>
                                        <div><i data-feather="map-pin"></i> <?php //echo $row['e_location']; ?></div>
                                    </div>
                                </div>
                                <h3><a href="events_details.php?event=<?php //echo $row['e_id']; ?>"><?php //echo $row['e_title']; ?></a></h3>
                            </div>
                            <div class="text-md-right read-more-wrap">
                                <a href="events_details.php?event=<?php //echo $row['e_id']; ?>" class="read-more-line"><span>Read More</span></a>
                            </div>
                            <!-- Event Wrap -->
                        </div>
                    </div>
                    <?php  //} } ?>
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