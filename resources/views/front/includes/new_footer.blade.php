<!-- Main Footer Start -->
   
   <footer class="wide-tb-70 pb-0 mb-spacer-md">
    <div class="container pos-rel">
        <div class="row">
            <div class="col-lg-5 col-md-10">
                <div class="footer-subscribe">
                    <h3>Newsletter</h3>
                    <h2>Get Update Every Week</h2>
                    <form action="" method="post">
                    <div class="input-wrap">
                        
                            <input type="text" name="email" placeholder="Enter Your Email">
                            <button type="submit" name="news" class="btn btn-default">Subscribe now</button>
                            </div>
                        </form>
                        <?php 
                        if(isset($_POST['news'])){
                            $email = $_POST['email'];
                            mysqli_query($con,"INSERT INTO `newsletter`(`nl_cat`, `nl_email`, `nl_create_date`) VALUES('Newsletter','$email',NOW())");
                            //echo "<script>window.open('index.php','_self')</script>";
                            }
                        ?>
                   
                </div>  
            </div>
            <div class="give-us-call">
                <i data-feather="phone"></i>
                <h4>Give us a call</h4>

                @if($contact)
                    @php
                        $phones = explode(',', $contact->phone);
                    @endphp
                        @foreach($phones as $phone)
                            <a href="tel:{{ trim($phone) }}"><h3>+91 {{trim($phone)}}</h3></a><br>
                        @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <!-- Column First -->
            <div class="col-lg-3 col-md-6">
                <div class="logo-footer">
                    <img src="{{url('/')}}/front/assets/images/logo_white.svg" alt="">
                </div>
               
                <p>{{$contact->short_desc}}</p>
               
                <div class="social-icons">
                    <ul class="list-unstyled list-group list-group-horizontal">
                        @if($contact && $contact->fb_link)
                        <li><a href="{{ $contact->fb_link }}" target="_blank"><i class="icofont-facebook"></i></a></li>
                        @endif

                        @if($contact && $contact->twitter_link)
                        <li><a href="{{ $contact->twitter_link }}" target="_blank"><i class="icofont-twitter"></i></a></li>
                        @endif

                        @if($contact && $contact->insta_link)
                        <li><a href="{{ $contact->insta_link }}" target="_blank"><i class="icofont-instagram"></i></a></li>
                        @endif

                        @if($contact && $contact->behance_link)
                        <li><a href="{{ $contact->behance_link }}" target="_blank"><i class="icofont-behance"></i></a></li>
                        @endif

                        @if($contact && $contact->youtube_link)
                        <li><a href="{{ $contact->youtube_link }}" target="_blank"><i class="icofont-youtube-play"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Column First -->

            <!-- Column Second -->
            <div class="col-lg-4 col-md-6">
                <h3 class="footer-heading">Contact Info</h3>

                <div class="footer-widget-contact">
                    <ul class="list-unstyled">
                        <li>
                            <div><i data-feather="map-pin"></i> </div>
                            <div>{{$contact->address}}, {{$contact->city}}, {{$contact->state}} - {{$contact->zipcode}} ({{$contact->country}})</div>
                        </li>
                        <li>
                            <div><i data-feather="phone"></i> </div>
                            <div>
                                @if($contact)
                                    @php
                                        $phones = explode(',', $contact->phone);
                                    @endphp
                                        @foreach($phones as $phone)
                                            <a href="tel:{{trim($phone)}}">+91 {{trim($phone)}}</a>@break<br>
                                        @endforeach
                                    
                                @endif
                            </div>
                        </li>
                        <li>
                            <div><i data-feather="mail"></i> </div>
                            @if($contact && $contact->emailid)
                                @php
                                    $allemail = explode(',', $contact->emailid);
                                @endphp
                                @foreach($allemail as $allemailVal)    
                                  
                                    <a href="mailto:{{trim($allemailVal)}}">{{$allemailVal}}</a>
                                    @break<br>
                                @endforeach
                            @endif
                        </li>
                        <li>
                            <div><i data-feather="clock"></i> </div>
                            <div>
                                @if($contact && $contact->workingDays && $contact->officeTime)
                                    {{$contact->workingDays}}  /  {{$contact->officeTime}}
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>                
            <!-- Column Second -->

            <!-- Spacer For Medium -->
            <div class="w-100 d-none d-md-block d-lg-none spacer-30"></div>
            <!-- Spacer For Medium -->

            <!-- Column Third -->
            <div class="col-lg-2 col-md-6">
                <h3 class="footer-heading">Explore Us</h3>
                <div class="footer-widget-menu">
                    <ul class="list-unstyled">
                        <li><a href="index.php"><i class="icofont-simple-right"></i> <span>Home</span></a></li>
                        <li><a href="about.php"><i class="icofont-simple-right"></i> <span>About Us</span></a></li>
                        <li><a href="management.php"><i class="icofont-simple-right"></i> <span>Management</span></a></li>
                        <li><a href="image.php"><i class="icofont-simple-right"></i> <span>Our Gallery</span></a></li>
                        <li><a href="video.php"><i class="icofont-simple-right"></i> <span>Our Video</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- Column Third -->

            <!-- Column Fourth -->
            <div class="col-lg-3 col-md-6">
                <h3 class="footer-heading">Explore Us</h3>
                <div class="footer-widget-menu">
                <ul class="list-unstyled">
                    <li><a href="events.php"><i class="icofont-simple-right"></i> <span>Event</span></a></li>
                    <li><a href="blog.php"><i class="icofont-simple-right"></i> <span>Blog</span></a></li>
                    <li><a href="contact.php"><i class="icofont-simple-right"></i> <span>Contact</span></a></li>
                    <li><a href="donation.php"><i class="icofont-simple-right"></i> <span>Donation</span></a></li>
                    <li><a href="user/login.php"><i class="icofont-simple-right"></i> <span>Members</span></a></li>
                </ul>
                </div>
            </div>
            <!-- Column Fourth -->
        </div>
    </div>  

    <div class="copyright-wrap">
        <div class="container pos-rel">
            <div class="row text-md-start text-center">
                <div class="col-sm-12 col-md-auto copyright-text">
                    © Copyright <span class="txt-blue">{{$contact->copyright}}</span> |
                    Created by <a href="{{$contact->created_by_url}}" rel="nofollow" target="_blank">{{$contact->created_by}}</a>
                </div>

                <div class="col-sm-12 col-md-auto ml-md-auto text-md-right text-center copyright-links">
                    <a href="#">Terms & Condition</a> | <a href="privacy-policy.php">Privacy Policy</a> | <a href="press.php">Press</a>
                </div>
            </div>
        </div>
    </div>
</footer>
    <!-- Main Footer End -->

    <!-- Search Popup Start -->
    <div class="overlay overlay-hugeinc">    
        <form class="form-inline mt-2 mt-md-0">
            <div class="form-inner">
                <div class="form-inner-div d-inline-flex align-items-center no-gutters">
                    <div class="col-auto">
                        <i class="icofont-search"></i>
                    </div> 
                    <div class="col">
                        <input class="form-control w-100 p-0" type="text" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col-auto">
                        <a href="#" class="overlay-close link-oragne"><i class="icofont-close-line"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Search Popup End -->

    <!-- Back To Top Start -->
    <a id="mkdf-back-to-top" href="#" class="off"><i data-feather="corner-right-up"></i></a>
    <!-- Back To Top End -->

    <!-- Jquery Library JS -->
    <script src="{{url('/')}}/front/assets/library/jquery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{url('/')}}/front/assets/library/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Feather Icon JS -->
    <script src="{{url('/')}}/front/assets/library/feather-icons/feather.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="{{url('/')}}/front/assets/library/owlcarousel/js/owl.carousel.min.js"></script>
    <!-- Select2 Dropdown JS -->
    <script src="{{url('/')}}/front/assets/library/select2/js/select2.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="{{url('/')}}/front/assets/library/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- jflickrfeed Images JS -->
    <script src="{{url('/')}}/front/assets/library/jflickrfeed/jflickrfeed.min.js"></script>
    <!-- Way Points JS -->
    <script src="{{url('/')}}/front/assets/library/jquery-waypoints/jquery.waypoints.min.js"></script>
    <!-- Count Down JS -->
    <script src="{{url('/')}}/front/assets/library/countdown/jquery.countdown.min.js"></script>
    <!-- Appear JS -->
    <script src="{{url('/')}}/front/assets/library/jquery-appear/jquery.appear.js"></script>
    <!-- Jquery Easing JS -->
    <script src="{{url('/')}}/front/assets/library/jquery-easing/jquery.easing.min.js"></script>
    <!-- Counter JS -->
    <script src="{{url('/')}}/front/assets/library/jquery.counterup/jquery.counterup.min.js"></script>
    <!-- Form Validation JS -->
    <script src="{{url('/')}}/front/assets/library/jquery-validate/jquery.validate.min.js"></script>
    <!-- Theme Custom -->
    <script src="{{url('/')}}/front/assets/js/site-custom.js"></script>

    <!-- Home Slider (Only For Home pages) -->
    <script src="{{url('/')}}/front/assets/js/home-slider.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    function setAmount(value) {
        document.getElementById('custom').value = value;
    }

   function validateForm() {
    const amount = parseFloat(document.getElementById('custom').value);

    if (isNaN(amount) || amount < 100) {
        alert("Minimum donation amount is ₹100.");
        return false;
    }
        return true;
    }
</script>
</body>
</html>
<?php 
if (isset($_POST['donation'])) {
    $d_name = trim($_POST['d_name']);
    $d_email = trim($_POST['d_email']);
    $d_mobile = trim($_POST['d_mobile']);
    $d_pancard = trim($_POST['d_pancard']);
    $d_causes = trim($_POST['d_causes']);
    $input_amount = floatval($_POST['input_amount']);
    $radio_amount = isset($_POST['radio_amount']) ? floatval($_POST['radio_amount']) : 0;

    $d_amount = max($input_amount, $radio_amount);

    // ✅ Check if donation is at least ₹100
    if ($d_amount < 100) {
        echo '<script>
            swal({
                title: "Minimum Donation is ₹100",
                text: "Please increase your donation.",
                icon: "warning"
            });
        </script>';
        exit;
    }

    $stmt = $con->prepare("INSERT INTO `donation` (`d_name`, `d_email`, `d_mobile`, `d_pancard`, `d_causes`, `d_amount`, `d_create_date`) VALUES (?, ?, ?, ?, ?, ?, NOW())");

    if ($stmt) {
        $stmt->bind_param("sssssd", $d_name, $d_email, $d_mobile, $d_pancard, $d_causes, $d_amount);
        $stmt->execute();
        $stmt->close();

        echo '<script>
            swal({
                title: "Donation Amount Request Accepted!",
                text: "Click Ok",
                icon: "success"
            }).then(function(){
                window.location = "index.php";
            });
        </script>';
    } else {
        echo '<script>
            swal({
                title: "Database Error!",
                text: "Something went wrong.",
                icon: "error"
            });
        </script>';
    }
}
?>
