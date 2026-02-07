@extends('admin.layout.layout')
@php
    $title='Blog Details';
    $subTitle = 'Blog Details';
@endphp

@section('content')
<style>
.comment-list {
    max-height: 500px;   /* apne layout ke hisaab se change */
    overflow-y: auto;
}
/* Modal overlay + center alignment */
#login-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5); /* semi-transparent black */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

/* Modal content box */
#login-popup > div {
    background: #fff;
    padding: 24px;
    border-radius: 8px;
    width: 400px; /* adjust for responsive */
    max-width: 90%;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    position: relative;
}

/* Close button */
#login-popup button.close-modal {
    position: absolute;
    top: 8px;
    right: 12px;
    font-size: 20px;
    background: none;
    border: none;
    cursor: pointer;
}

/* Input fields */
#login-popup input {
    width: 100%;
    padding: 8px 10px;
    margin-bottom: 12px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

/* Login button */
#login-popup button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #3b82f6; /* blue */
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
}

/* Optional: smooth fade-in/out */
#login-popup.show {
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}

#login-popup.hide {
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}



</style>    

    <div class="row gy-4">
        <div class="col-lg-8">
            <div class="card p-0 radius-12 overflow-hidden">
                <div class="card-body p-0">
                    @if(!empty($blog->bgimage))
                    <img src="{{asset('storage/'.$blog->bgimage)}}" alt="" class="w-100 h-100 object-fit-cover">
                    @else
                    <img src="{{ asset('assets/images/user-grid/NGOBanner.png') }}" alt="" class="w-100 h-100 object-fit-cover">
                    @endif
                    <div class="p-32">
                        <div class="d-flex align-items-center gap-16 justify-content-between flex-wrap mb-24">
                            <div class="d-flex align-items-center gap-8">
                                <?php
                                if(empty($blog->authimage)){
                                    ?> <img src="{{url('/')}}/assets/images/user-list/user.png" alt="" class="w-40-px h-40-px rounded-circle object-fit-cover"><?php
                                }else{
                                    ?> <img src="{{asset('storage/'.$blog->authimage)}}" alt="" class="w-40-px h-40-px rounded-circle object-fit-cover"><?php
                                }
                                ?>
                                <div class="d-flex flex-column">
                                    <h6 class="text-lg mb-0">{{$blog->author}}</h6>
                                    <span class="text-sm text-neutral-500">{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-md-3 gap-2 flex-wrap">
                                <div class="d-flex align-items-center gap-8 text-neutral-500 text-lg fw-medium">
                                    <i class="ri-chat-3-line"></i>
                                    {{$totalComments}} Comments
                                </div>
                                <div class="d-flex align-items-center gap-8 text-neutral-500 text-lg fw-medium">
                                    <i class="ri-calendar-2-line"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-16">{{$blog->title}}</h3>
                        <p class="text-neutral-500 mb-16"> {{strip_tags($blog->description)}}</p>
                       
                    </div>
                </div>
            </div>
            <div class="card mt-24">
                <div class="card-header border-bottom">
                    <h6 class="text-xl mb-0">Comments</h6>
                </div>
                <div class="card-body p-24">
                    <div class="comment-list d-flex flex-column">

                    @include('blog.comments', ['comments' => $comments])
                      
                    </div>
                </div>
            </div>
            <div class="card mt-24" id="comment-form">
                <div class="card-header border-bottom">
                    <h6 class="text-xl mb-0">Add A Comment</h6>
                </div>
                <div class="card-body p-24">

                   
                        <form action="{{route('admin.comment',$blog->id)}}" method="POST" class="d-flex flex-column gap-16">
                            @csrf
                            <div>
                                <label class="form-label fw-semibold" for="desc">Comment </label>
                                <textarea name="comment" class="form-control border border-neutral-200 radius-8" rows="4" cols="50" id="desc" placeholder="Enter a description..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-600 radius-8">Submit</button>
                        </form>
                   
                    

                    
                </div>
            </div>
        </div>

        <!-- Sidebar Start -->
        <div class="col-lg-4">
            <div class="d-flex flex-column gap-24">

                <!-- Search -->
                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">Search Here</h6>
                    </div>
                    <div class="card-body p-24">
                        <form class="position-relative">
                            <input type="text" class="form-control border border-neutral-200 radius-8 ps-40" name="search" placeholder="Search">
                            <iconify-icon icon="ion:search-outline" class="icon position-absolute positioned-icon top-50 translate-middle-y"></iconify-icon>
                        </form>
                    </div>
                </div>

                <!-- Latest Blog -->
                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">Latest Blogs</h6>
                    </div>
                    @foreach($latestblogs as $latestblogsVal)
                    <div class="card-body d-flex flex-column gap-24 p-24">
                        <div class="d-flex flex-wrap">
                            <a  href="{{ route('admin.blog_details', $latestblogsVal->slug) }}" class="blog__thumb w-100 radius-12 overflow-hidden">
                                @if(!empty($latestblogsVal->bgimage))
                                <img src="{{asset('storage/'.$latestblogsVal->bgimage)}}" alt="" class="w-100 h-100 object-fit-cover">
                                @else
                                <img src="{{asset('assets/images/user-grid/NGOBanner.png')}}" alt="" class="w-100 h-100 object-fit-cover">
                                @endif
                            </a>
                            <div class="blog__content">
                                <h6 class="mb-8">
                                    <a  href="{{ route('admin.blog_details', $latestblogsVal->slug) }}" class="text-line-2 text-hover-primary-600 text-md transition-2">{{$latestblogsVal->title}}</a>
                                </h6>
                                <p class="text-line-2 text-sm text-neutral-500 mb-0">{{strip_tags($latestblogsVal->description)}}</p>
                            </div>
                        </div>
                       
                    </div>
                    @endforeach
                </div>

                <!-- Category -->
                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">Categories</h6>
                    </div>
                    <div class="card-body p-24">
                        <ul>
                            @foreach($categories as $categoriesVal)
                            <li class="w-100 d-flex align-items-center justify-content-between flex-wrap gap-8 border-bottom border-dashed pb-12 mb-12">
                                <a  href="{{route('admin.category', $categoriesVal->category)}}" class="text-hover-primary-600 transition-2"> {{ucfirst($categoriesVal->category)}} </a>
                                <span class="text-neutral-500 w-28-px h-28-px rounded-circle bg-neutral-100 d-flex justify-content-center align-items-center transition-2 text-xs fw-semibold"> {{$categoriesVal->total}} </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Tags -->
                <div class="card">
                    <div class="card-header border-bottom">
                        <h6 class="text-xl mb-0">Tags</h6>
                    </div>
                    <div class="card-body p-24">
                        <div class="d-flex align-items-center flex-wrap gap-8">
                            @foreach($tags as $tagsVal)
                            <a  href="{{route('admin.tag', $tagsVal->tags)}}" class="btn btn-sm btn-primary-600 bg-primary-50 bg-hover-primary-600 text-primary-600 border-0 d-inline-flex align-items-center gap-1 text-sm px-16 py-6"> {{$tagsVal->tags}} ({{$tagsVal->total}})</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

 



    </div>

   
    
@endsection





<script>
function showLoginPopup() {
    // show modal
    let popup = document.getElementById('login-popup');
    popup.classList.remove('d-none'); // for Bootstrap
    // popup.classList.remove('hidden'); // if Tailwind

    // optional: focus on first input
    popup.querySelector('input[name="email"]').focus();
}

function closeLoginPopup() {
    document.getElementById('login-popup').classList.add('d-none');
}
</script>