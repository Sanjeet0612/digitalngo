<!doctype html>
<html lang="en">
<head>
    <!-- xxx Basics xxx -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- xxx Change With Your Information xxx -->    
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <title>Mahror Foundation</title>
    <meta name="author" content="Mahror Foundation">     
    <meta name="description" content="Mahror Foundation help save earth">
    <meta name="keywords" content="Mahror, Mahror Foundation, charity foundation, charity template, church, donate, donation, fundraiser, fundraising, mosque, ngo, non-profit, nonprofit, organization, volunteer">
    
    <!-- Favicon -->    
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <!-- Animate CSSS -->    
    <link href="{{url('/')}}/front/assets/library/animate/animate.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{url('/')}}/front/assets/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icofont CSS -->
    <link href="{{url('/')}}/front/assets/library/icofont/icofont.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="{{url('/')}}/front/assets/library/owlcarousel/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Select Dropdown CSS -->
    <link href="{{url('/')}}/front/assets/library/select2/css/select2.min.css" rel="stylesheet">
    <!-- Magnific Popup CSS -->
    <link href="{{url('/')}}/front/assets/library/magnific-popup/magnific-popup.css" rel="stylesheet">    
    <!-- Main Theme CSS -->
    <link href="{{url('/')}}/front/assets/css/style.css" rel="stylesheet">
    <!-- Home SLider CSS -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/home-main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->		
</head>
<body>

    <!-- Page loader Start -->
    <div id="pageloader">   
        <div class="loader-item">
            <div class="loader">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
              </div>
        </div>
    </div>
    <!-- Page loader End -->

   <!-- Header Start -->
   
   <header>
<div class="top-bar-right d-flex align-items-center text-md-left">
    <div class="container">
        <div class="row align-items-center">
            <div class="col d-flex align-items-center contact-info">
                    @if($contact)
                        @php
                            $firstPhone = explode(',', $contact->phone)[0];
                        @endphp
                        <div><i data-feather="phone"></i>  
                            <a href="tel:{{ $firstPhone }}">{{ $firstPhone }}</a>
                        </div>
                    @endif
                <div>
                    <i data-feather="mail"></i>  <a href="mailto:info@mahrorfoundation.com">info@mahrorfoundation.com</a>
                </div>
                <div>
                    <i data-feather="clock"></i>  Mon-Sat  /  9:00 AM - 19:00 PM
                </div>
            </div>

            <style>
                .dropdown-togglee::after {
                    content: " ";
                    width: auto;
                    padding-left: 0.0rem;
                }
            </style>    

            <div class="col-md-auto">
                <div class="social-icons">
                    <a href="#"><i class="icofont-facebook"></i></a>
                    <a href="#"><i class="icofont-twitter"></i></a>
                    <a href="#"><i class="icofont-instagram"></i></a>
                    <a href="#"><i class="icofont-behance"></i></a>
                    <a href="#"><i class="icofont-youtube-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation Start -->
<nav class="navbar navbar-expand-lg header-fullpage">
    <div class="container text-nowrap">
        <div class="d-flex align-items-center w-100 col p-0 logo-brand">
            <a class="navbar-brand rounded-bottom light-bg" href="{{url('/')}}">
                <!--<img src="assets/images/logo_dark.svg" alt="">-->
                <h1>Mahror Foundation</h1>
            </a> 
        </div>
        <!-- Topbar Buttons Start -->
        <div class="d-inline-flex request-btn order-lg-last col-auto p-0 align-items-center"> 
             @if(Auth::check())
            <div class="dropdown d-inline-block">
                <a href="#" class="dropdown-togglee">
                    <i class="icofont-ui-user" style="color:#D59B2D;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="background-color: #d59b2d !important;color: #fff !important;">
                    <a class="dropdown-item" href="#" style="color:#fff">Profile</a>
                    <a class="dropdown-item" href="#" style="color:#fff">Settings</a>
                    <a class="dropdown-item" href="#" style="color:#fff">Logout</a>
                </div>
            </div>
            @else
                <a href="{{route('login')}}" class="dropdown-togglee">
                    <i class="icofont-ui-user" style="color:#D59B2D;"></i>
                </a>
            @endif
            <!--<a class="btn-outline-primary btn ml-3" href="#" id="search_home"><i data-feather="search"></i></a>-->
            <a class="nav-link btn btn-default ml-3 donate-btn" href="{{url('/')}}/donation">Join Member</a>

            <!-- Toggle Button Start -->
            <button class="navbar-toggler x collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Toggle Button End -->  
        </div>
        <!-- Topbar Buttons End -->

        <div class="collapse navbar-collapse" id="navbarCollapse" data-hover="dropdown" data-animations="slideInUp slideInUp slideInUp slideInUp">
            <ul class="navbar-nav ml-auto">
             
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}/about">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-mob" href="{{url('/')}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Team <i class="icofont-rounded-down"></i></a>
                    <ul class="dropdown-menu">                  
                        <li><a class="dropdown-item" href="{{url('/')}}/management">Management Teams</a></li>
                        <li><a class="dropdown-item" href="{{url('/')}}/volunteers">Volunteers Teams</a></li>                
                        <!-- <li><a class="dropdown-item" href="become-volunteers.php">Become Volunteers</a></li>                
                        <li><a class="dropdown-item" href="our-faqs.php">Our Faq's</a></li>  -->               
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-mob" href="{{url('/')}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery <i class="icofont-rounded-down"></i></a>
                    <ul class="dropdown-menu">                  
                        <li><a class="dropdown-item" href="{{url('/')}}/image">Picture</a></li>
                        <li><a class="dropdown-item" href="{{url('/')}}/video">Video</a></li>                              
                    </ul>
                </li>
              <!--  <li class="nav-item">
                    <a class="nav-link" href="causes.php">Causes</a>
                </li>  -->                    
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}/events">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}/articles">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}/contact">Contact</a>
                </li>
                
            </ul>
            <!-- Main Navigation End -->
        </div>
    </div>
</nav>
<!-- Main Navigation End -->
</header>
   
    <!-- Header Start -->