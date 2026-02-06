@include('front.includes.new_header')

          <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Blog</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog  </li>
                    </ol>
                </nav>  
            </div>
        </div>
    </section>
    <!-- Page Breadcrumbs End -->

    <!-- Main Body Content Start -->
    <main id="body-content">

        <!-- Blog Post Start -->
        <section class="wide-tb-100">
            <div class="container">
                <div class="row">                    
                    <div class="col-lg-9 col-md-12">
                        <div class="sidebar-spacer">
                            <div class="row">
                           
                                <!-- Blog Wrap -->
                                @foreach($allBlog as $allBlogVal) 
                                <div class="col-md-6 mb-0">                                    
                                    <div class="post-wrap">
                                        <div class="post-img">
                                            <a href="{{route('details',$allBlogVal->slug)}}"><img src="{{asset('storage/'.$allBlogVal->bgimage)}}" alt=""></a>
                                        </div>
                                        <div class="post-content">
                                            <div class="post-date">{{ $allBlogVal->created_at->format('d, M, Y') }}</div>
                                            <h3 class="post-title"><a href="{{route('details',$allBlogVal->slug)}}">{{ $allBlogVal->title}}</a></h3>
                                            <div class="post-category">{{ucfirst($allBlogVal->category)}}</div>
                                            <div class="post-category">{!! \Illuminate\Support\Str::limit(strip_tags($allBlogVal->description), 100) !!}</div>
                                            <div class="text-md-right">
                                                <a href="{{route('details',$allBlogVal->slug)}}" class="read-more-line"><span>Read More</span></a>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                @endforeach
                               
                            </div>

                            <div class="theme-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i data-feather="chevron-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i data-feather="chevron-right"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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

                                <!-- Widget Wrap -->
                                <div class="widget-wrap">
                                    <h3 class="widget-title">Popular Posts</h3>
                                    
                                    <div class="popular-post">
                                        <ul class="list-unstyled">
                                            @foreach($latestblogs as $latestblogsVal)
                                            <li>
                                                <img src="{{asset('storage/'.$latestblogsVal->bgimage)}}" alt="">
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
                                                <a href="causes-single.html"><img src="{{url('/')}}/front/assets/images/causes/causes_img_3.jpg" alt=""></a>
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
                                                    <a href="causes-single.html"><img src="{{url('/')}}/front/assets/images/causes/causes_img_2.jpg" alt=""></a>
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
                                                    <a href="causes-single.html"><img src="{{url('/')}}/front/assets/images/causes/causes_img_6.jpg" alt=""></a>
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
                                        <img src="{{url('/')}}/front/assets/images/sidebar_ads.jpg" alt="">
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
        <!-- Blog Post End -->        
           
    </main>

         <!-- Main Footer Start -->

@include('front.includes.new_footer')