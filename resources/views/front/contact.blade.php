@include('front.includes.new_header')

            <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Contact Us</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>  
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Contact Us Style Start -->
        <section class="wide-tb-100 pb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-12">
                        <h1 class="heading-main">
                            <small>Get In Touch</small>
                            Contact With Us
                        </h1>

                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make in the lives of the poor, the abused and the helpless. Spread sunshine in their lives no matter what the weather may be.</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-8 col-md-12 order-lg-last">
                        <div class="contact-wrap">
                            <div class="contact-icon-xl">
                                <i class="charity-love_hearts"></i>
                            </div>
                            <div id="sucessmessage"> </div>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="c_name" id="name" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="number" name="c_mobile" id="phone" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="email" name="c_email" id="email" class="form-control" placeholder="Your Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-0">
                                        <div class="form-group">
                                            <input type="text" name="c_sub" id="c_sub" class="form-control" placeholder="Your Subject">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-0">
                                        <div class="form-group">
                                            <textarea name="c_message" id="comment" class="form-control" rows="6" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="contact" class="btn btn-primary text-nowrap">Send Message</button>
                                    </div>
                                </div>
                                
                            </form>
                       
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-orange mb-4">
                            <i data-feather="map-pin"></i>
                            <h3>Our Address</h3>
                            <div>Mahadeo Asthan Maner, Patna, Bihar -801108 (India)</div>
                        </div>
                        <!-- Icon Boxes Style -->

                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-green mb-4">
                            <i data-feather="phone"></i>
                            <h3>Phone Number</h3>
                            <div>+91 8478884111<br>+91 9122691369</div>
                        </div>
                        <!-- Icon Boxes Style -->

                        <!-- Icon Boxes Style -->
                        <div class="icon-box-4 bg-gray mb-4">
                            <i data-feather="mail"></i>
                            <h3>Email Address</h3>
                            <div><a href="mailto:info@mahrorfoundation.com">info@mahrorfoundation.com</a></div>
                            <div><a href="mailto:volunteer@mahrorfoundation.com">volunteer@mahrorfoundation.com</a></div>
                        </div>
                        <!-- Icon Boxes Style -->
                    </div>
                   
                </div>
            </div>
        </section>

        <section class="wide-tb-100">
            <div class="map-frame">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2927.2748242438715!2d84.87146881667613!3d25.63695377550902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x94aa55a3f021d3b2!2zMjXCsDM4JzEzLjAiTiA4NMKwNTInMzIuNSJF!5e1!3m2!1sen!2sin!4v1670490521622!5m2!1sen!2sin"></iframe>
                 </div>
            <div class="container">
                <div class="row">
                    <!-- Callout Section Side Image -->
                    <div class="col-sm-12">
                        <div class="callout-style-side-img d-lg-flex align-items-center top-broken-grid">
                            <div class="img-callout">
                                <img src="{{url('/')}}/front/assets/images/callout_side_img.jpg" alt="">
                            </div>
                            <div class="text-callout">
                                <div class="d-md-flex align-items-center">
                                   
                                    <div class="heading">
                                        <h2>Let Us Come Together To Make A Difference</h2>
                                    </div>
                                    <div class="icon">
                                        <a href="donation-page.html" class="btn btn-default">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Callout Section Side Image -->
                </div>
            </div>
        </section>
        <!-- Contact Us Style Start -->
    </main>

   <!-- Main Footer Start -->

@include('front.includes.new_footer')