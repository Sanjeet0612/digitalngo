@extends('admin.layout.layout')
@php
    $title='Sponsor';
    $subTitle = 'Manage Sponsor';
    $script = '<script>
                        $(".delete-btn").on("click", function() {
                            $(this).closest(".user-grid-card").addClass("d-none")
                        });
                </script>';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <form class="navbar-search">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Search">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                    <a  href="{{route('admin.add-sponsor')}}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Add New Sponsor
                    </a>
                  
                </div>
                  <div class="message">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    </div>
                <div class="card-body p-24">
                    <div class="row gy-4">
                         @foreach($sponsorList as $eventListVal)
                        <div class="col-xxl-3 col-md-6 user-grid-card   ">
                            <div class="position-relative border radius-16 overflow-hidden">
                                @if(!empty($eventListVal->banner))
                                <img src="{{url('/')}}/{{$eventListVal->banner}}" alt="" class="w-100 object-fit-cover">
                                @else
                                <img src="{{ asset('assets/images/user-grid/user-grid-bg1.png') }}" alt="" class="w-100 object-fit-cover">
                                @endif
                                
                                
                                <?php
                                $sessiondata = session()->get('logSession');
                                $userid      = session('logSession.id');
                                ?>
                                @if($eventListVal->user_id==$userid)
                                <div class="dropdown position-absolute top-0 end-0 me-16 mt-16">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="bg-white-gradient-light w-32-px h-32-px radius-8 border border-light-white d-flex justify-content-center align-items-center text-white">
                                        <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                                    </button>
                                    <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"  href="{{url('/')}}/edit-sponsor/{{base64_encode($eventListVal->id)}}">
                                                Edit
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                
                                
 
                                <div class="ps-16 pb-16 pe-16 text-center" style="margin-top:8%">
                                    <h6 class="text-lg mb-0 mt-4">{{$eventListVal->name}}</h6>
                                    <small class="text-line-3 text-neutral-500">{{strip_tags($eventListVal->email)}}</small>
                                    @if($eventListVal->sponsor_type=="silver")
                                        <img src="{{url('/assets/images/event/silver.png')}}" style="width:40%;">
                                    
                                    @elseif($eventListVal->sponsor_type=="bronze")
                                        <img src="{{url('/assets/images/event/bronze.png')}}" style="width:40%;">
                                        
                                    @else($eventListVal->sponsor_type=="gold")
                                        <img src="{{url('/assets/images/event/gold.png')}}" style="width:40%;"> 
                                    
                                    @endif 
                                    
                                    <p class="text-line-3 text-neutral-500"></p>
                                   
                                    @if($eventListVal->is_verified==0)
                                        <a  href="javascript:void(0)" class="bg-warning-focus text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                        Pending For Approval
                                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
                                        </a>
                                    @else
                                        <a  href="" class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                            View Event
                                            <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
                                        </a>
                                    @endif
                                </div>
                                
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                        <span>Showing 1 to 10 of 12 entries</span>
                        <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"  href="javascript:void(0)">
                                    <iconify-icon icon="ep:d-arrow-left" class=""></iconify-icon>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600 text-white"  href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px"  href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"  href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"  href="javascript:void(0)">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"  href="javascript:void(0)">5</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"  href="javascript:void(0)">
                                    <iconify-icon icon="ep:d-arrow-right" class=""></iconify-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

@endsection
