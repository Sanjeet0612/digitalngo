@extends('admin.layout.layout')
@php
    $title=$title;
    $subTitle = $title;
@endphp

@section('content')

            <div class="row gy-4">
                <!-- Style Two -->
                <div class="message">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                </div>
                @foreach($blogs as $blogsVal)
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <div class="card h-100 p-0 radius-12 overflow-hidden">
                        <div class="card-body p-0">
                            <a  href="{{ route('details', $blogsVal->slug) }}" class="w-100 max-h-266-px radius-0 overflow-hidden">
                                @if(!empty($blogsVal->bgimage))
                                <img src="{{asset('storage/'.$blogsVal->bgimage)}}" alt="" class="w-100 h-100 object-fit-cover">
                                @else
                                <img src="{{ asset('assets/images/user-grid/NGOBanner.png') }}" alt="" class="w-100 h-100 object-fit-cover">
                                @endif
                            </a>
                            <div class="p-20">
                                <h6 class="mb-16">
                                    <a  href="{{ route('details', $blogsVal->slug) }}" class="text-line-2 text-hover-primary-600 text-xl transition-2">{{$blogsVal->title}}</a>
                                </h6>
                                <p class="text-line-3 text-neutral-500 mb-0">{{strip_tags($blogsVal->description)}}</p>
                                <span class="d-block border-bottom border-neutral-300 border-dashed my-20"></span>
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-6">
                                    <div class="d-flex align-items-center gap-8">
                                        <?php
                                            if(empty($blogsVal->authimage)){
                                                ?> <img src="{{url('/')}}/assets/images/user-list/user.png" alt="" class="w-40-px h-40-px rounded-circle object-fit-cover"><?php
                                            }else{
                                                ?> <img src="{{asset('storage/'.$blogsVal->authimage)}}" alt="" class="w-40-px h-40-px rounded-circle object-fit-cover"><?php
                                            }
                                        ?>
                                        <div class="d-flex flex-column">
                                            <h6 class="text-sm mb-0">{{$blogsVal->author}}</h6>
                                            <span class="text-xs text-neutral-500">{{ \Carbon\Carbon::parse($blogsVal->created_at)->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <a  href="{{ route('details', $blogsVal->slug) }}" class="btn btn-sm btn-primary-600 d-flex align-items-center gap-1 text-xs px-8 py-6">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
@endsection