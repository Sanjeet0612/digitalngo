@include('front.includes.new_header')

        <!-- Page Breadcrumbs Start -->
    <section class="breadcrumbs-page-wrap">
        <div class="bg-fixed pos-rel breadcrumbs-page">
            <div class="container">
                <h1>Causes</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Causes</li>
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
                    <!-- Blog Wrap -->
                     @foreach($allCauses as $allCausesVal)
                    <div class="col-md-6 col-lg-4 col-sm-12 mb-0">                                    
                        <div class="post-wrap">
                            <div class="post-img">
                                <a href="{{route('causes',$allCausesVal->slug)}}"><img src="{{asset('storage/'.$allCausesVal->banner)}}" alt=""></a>
                            </div>
                            <div class="post-content">
                                <div class="post-date"><b>Start Date : </b> {{ \Carbon\Carbon::parse($allCausesVal->start_date)->format('d, M, Y') }}</div>
                                <div class="post-date"><b>End Date : </b> {{ \Carbon\Carbon::parse($allCausesVal->end_date)->format('d, M, Y') }}</div>
                                <h3 class="post-title"><a href="{{route('causes',$allCausesVal->slug)}}">{{$allCausesVal->title}}</a></h3>
                                <div class="post-category">{{ucfirst($allCausesVal->couses_cat_name)}}</div>
                                <div class="text-md-right">
                                    <a href="{{route('causes',$allCausesVal->slug)}}" class="read-more-line"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>                                    
                    </div>
                    @endforeach
                    <!-- Blog Wrap -->

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
        </section>
        <!-- Blog Post End -->
    </main>
    <!-- Main Footer Start -->

@include('front.includes.new_footer')