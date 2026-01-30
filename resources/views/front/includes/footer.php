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
                <h3>+91 8478884111</h3>
            </div>
        </div>
        <div class="row">
            <!-- Column First -->
            <div class="col-lg-3 col-md-6">
                <div class="logo-footer">
                    <img src="assets/images/logo_white.svg" alt="">
                </div>
                <p>Mahror Foundaton Help for nature save</p>
                <div class="social-icons">
                    <ul class="list-unstyled list-group list-group-horizontal">
                        <li><a href="#"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                        <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        <li><a href="#"><i class="icofont-behance"></i></a></li>
                        <li><a href="#"><i class="icofont-youtube-play"></i></a></li>
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
                            <div>Mahadeo Asthan Maner, Patna, Bihar -801108 (India)</div>
                        </li>
                        <li>
                            <div><i data-feather="phone"></i> </div>
                            <div><a href="tel:+91 8478884111">+91 8478884111</a></div>
                        </li>
                        <li>
                            <div><i data-feather="mail"></i> </div>
                            <div><a href="mailto:info@mahrorfoundation.com">info@mahrorfoundation.com</a></div>
                        </li>
                        <li>
                            <div><i data-feather="clock"></i> </div>
                            <div>Mon-Fri  /  9:00 AM - 19:00 PM</div>
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
                    © Copyright <span class="txt-blue">Mahror Foundation</span> 2022-<?php echo date("Y"); ?>. |
                    Created by <a href="https://mavsolution.com/" rel="nofollow">MAV Digital Solutions Pvt. Ltd.</a>
                </div>

                <div class="col-sm-12 col-md-auto ml-md-auto text-md-right text-center copyright-links">
                    <a href="#">Terms & Condition</a> | <a href="privacy-policy.php">Privacy Policy</a> | <a href="press.php">Press</a>
                </div>
            </div>
        </div>
    </div>
</footer>