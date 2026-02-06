   @include('front.includes.new_header')
   <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Blog Details</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                    </ol>
                </nav>  
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Blog Post Single Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row">                    
                    <div class="col-lg-9 col-md-12">
                        <div class="sidebar-spacer">
                            <div class="d-flex">
                                <div class="post-date txt-blue"><?php //echo date_format($date,"d, M, Y");?></div>
                                <div class="mx-2">/</div>
                                <div class="post-category"> <?php //echo $row_blog['b_cat_name']; ?></div>                        
                            </div>
                            <h1 class="heading-main">
                                <?php //echo $row_blog['b_title']; ?>
                            </h1>
                            
                            <!-- Causes Single Wrap -->
                            <div class="causes-wrap single">
                                <div class="img-wrap">
                                    @if(!empty($blog->bgimage))
                                    <img src="{{asset('storage/'.$blog->bgimage)}}" alt="">
                                    @else
                                    <img src="{{ asset('assets/images/user-grid/NGOBanner.png') }}" alt="">
                                    @endif
                                </div>
                                
                                <div class="content-wrap-single">
                                    <div>
                                    <h2><a href="{{route('details',$blog->slug)}}">{{$blog->title}}</a></h2>
                                    <small style="font-weight:bold;color:#D59B2D;">{{ $blog->created_at->format('d, M, Y') }}</small>
                                </div>  
                                   {!! $blog->description !!}                           
                                </div>

                                <div class="share-this-wrap">
                                    <div class="share-line">
                                        <div class="pr-4">
                                            <strong>Share This</strong>
                                        </div>
                                        <div class="pl-4">
                                            @php
                                                $shareUrl = urlencode(url()->current());
                                                $shareTitle = urlencode($blog->title ?? 'Check this out');
                                            @endphp
                                            <ul class="list-unstyled list-inline mb-0">
                                                <!-- Facebook -->
                                                <li class="list-inline-item">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                                                        <i class="icofont-facebook"></i>
                                                    </a>
                                                </li>
                                                <!-- Twitter / X -->
                                                <li class="list-inline-item">
                                                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank">
                                                        <i class="icofont-twitter"></i>
                                                    </a>
                                                </li>
                                                <!-- WhatsApp -->
                                                <li class="list-inline-item">
                                                    <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank">
                                                        <i class="icofont-whatsapp"></i>
                                                    </a>
                                                </li>
                                                <!-- LinkedIn -->
                                                <li class="list-inline-item">
                                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank">
                                                        <i class="icofont-linkedin"></i>
                                                    </a>
                                                </li>
                                                 <!-- Copy Link -->
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0)" onclick="copyShareLink()">
                                                        <i class="icofont-copy"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Causes Single Wrap -->
                             
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-12">
                        <aside class="row sidebar-widgets">
                            <!-- Sidebar Primary Start -->
                            <div class="sidebar-primary col-lg-12 col-md-6">
                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Search Keywords</h3>

                                    <form class="sidebar-search">
                                        <input type="text" class="form-control" placeholder="Enter here search...">
                                        <button type="submit" class="btn-link"><i class="icofont-search"></i></button>
                                    </form>
                                </div>
                                <!-- Widget Wrap -->

                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Categories</h3>
                                    
                                    <div class="blog-list-categories">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0">                                        
                                            @foreach($categories as $categoriesVal)                                       
                                            <li><a href="{{route('articles.category', $categoriesVal->category)}}">{{ucfirst($categoriesVal->category)}}</a></li>
                                            @endforeach                                          
                                        </ul>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->
                                 <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Tags</h3>
                                    
                                    <div class="blog-list-categories">
                                        <ul class="list-unstyled icons-listing theme-orange mb-0"> 
                                            @foreach($tags as $tagsVal)                                       
                                            <li><a href="{{route('articles.tags', $tagsVal->tags)}}">{{ucfirst($tagsVal->tags)}}</a></li>
                                            @endforeach                                     
                                        </ul>
                                    </div>
                                </div>

                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Popular Posts</h3>
                                    
                                    <div class="popular-post">
                                        <ul class="list-unstyled">
                                             @foreach($latestblogs as $latestblogsVal)
                                            <li>
                                                @if(!empty($latestblogsVal->bgimage))
                                                <img src="{{asset('storage/'.$latestblogsVal->bgimage)}}" alt="">
                                                @else
                                                <img src="{{ asset('assets/images/user-grid/NGOBanner.png') }}" alt="" style="width: 55%;">
                                                @endif
                                                <div>
                                                    <h6><a href="{{route('details',$latestblogsVal->slug)}}">{{$latestblogsVal->title}}</a></h6>
                                                    <small>{{ $latestblogsVal->created_at->format('d, M, Y') }}</small>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->
                            </div>
                            <!-- Sidebar Primary End -->

                            <!-- Sidebar Secondary Start -->
                            <div class="sidebar-secondary col-lg-12 col-md-6">
                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Recent Causes</h3>
                                    <div class="owl-carousel owl-theme" id="sidebar-causes">
                        
                                        <!-- Causes Wrap -->
                                        <div class="causes-wrap">
                                            <div class="img-wrap">
                                                <a href="causes-single.html"><img src="assets/images/causes/causes_img_3.jpg" alt=""></a>
                                                <div class="raised-progress">
                                                    <div class="skillbar-wrap">
                                                        <div class="clearfix">
                                                            <span class="txt-orange">$10086</span> raised of <span class="txt-green">$15000</span>
                                                        </div>           
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="content-wrap">
                                                <span class="tag">Health</span>
                                                <h3><a href="causes-single.html">Supply Water For Good Health</a></h3>
                                                <div class="text-md-right">
                                                    <a href="causes-single.html" class="read-more-line"><span>Read More</span></a>
                                                </div>
                                            </div>
    
                                        </div>
                                        <!-- Causes Wrap -->
                                    
                                        <!-- Causes Wrap -->
                                        <div class="item">
                                            <div class="causes-wrap">
                                                <div class="img-wrap">
                                                    <a href="causes-single.html"><img src="assets/images/causes/causes_img_2.jpg" alt=""></a>
                                                    <div class="raised-progress">
                                                        <div class="skillbar-wrap">
                                                            <div class="clearfix">
                                                                <span class="txt-orange">$10086</span> raised of <span class="txt-green">$15000</span>
                                                            </div>           
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="content-wrap">
                                                    <span class="tag">People</span>
                                                    <h3><a href="causes-single.html">Help For Homeless People</a></h3>
                                                    <div class="text-md-right">
                                                        <a href="causes-single.html" class="read-more-line"><span>Read More</span></a>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                        <!-- Causes Wrap -->
                                    
                                        <!-- Causes Wrap -->
                                        <div class="item">
                                            <div class="causes-wrap">
                                                <div class="img-wrap">
                                                    <a href="causes-single.html"><img src="assets/images/causes/causes_img_6.jpg" alt=""></a>
                                                    <div class="raised-progress">
                                                        <div class="skillbar-wrap">
                                                            <div class="clearfix">
                                                                <span class="txt-orange">$10086</span> raised of <span class="txt-green">$15000</span>
                                                            </div>           
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="content-wrap">
                                                    <span class="tag">Health</span>
                                                    <h3><a href="causes-single.html">Help From Natural
                                                        Disaster</a></h3>
                                                    <div class="text-md-right">
                                                        <a href="causes-single.html" class="read-more-line"><span>Read More</span></a>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div>
                                        <!-- Causes Wrap -->
                                    
                                    </div>
                                </div>
                                <!-- Widget Wrap -->


                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <div class="sidebar-ads">
                                        <img src="assets/images/sidebar_ads.jpg" alt="">
                                        <div class="content">
                                            <i class="charity-donate_money"></i>
                                            <h3>Let Us Come Together To Make A Difference</h3>
                                            <a href="donation-page.html" class="btn btn-secondary">Donate Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Widget Wrap -->
                            </div>
                            <!-- Sidebar Secondary End -->

                            
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Post Single End -->
           
    </main>
@include('front.includes.new_footer')