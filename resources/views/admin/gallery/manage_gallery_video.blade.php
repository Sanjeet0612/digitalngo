@extends('admin.layout.layout')
@php
    $title='Manage Gallery Video';
    $subTitle = 'Manage Gallery Video';
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
                    <a  href="{{route('admin.add_video')}}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Add New Video
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
                         @foreach($galleryList as $eventListVal)

                        <div class="col-xxl-6 col-md-6 user-grid-card   ">
                            <div class="position-relative border radius-16 overflow-hidden">
                               
                                <div class="ps-16 pb-16 pe-16 text-center" style="margin-top:8%">
                                    {!! $eventListVal->path !!}
                                    <p class="text-secondary-light text-sm mb-0 mt-3"><b class="text-md mb-0" >Category : </b> {{$eventListVal->category->cat_name}}</p>

                                    <a  href="{{route('video')}}" target="_blank" class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                        View video
                                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
                                    </a>
                                </div>
                                
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                        <span>Showing {{ $galleryList->firstItem() }} to {{ $galleryList->lastItem() }} of {{ $galleryList->total() }} entries</span>
                        <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">

                    	{{-- Previous --}}
                    	<li class="page-item {{ $galleryList->onFirstPage() ? 'disabled' : '' }}">
                    		<a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                    		   href="{{ $galleryList->previousPageUrl() ?? 'javascript:void(0)' }}">
                    			<iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                    		</a>
                    	</li>
                    
                    	{{-- Page Numbers --}}
                    	@foreach ($galleryList->links()->elements[0] ?? [] as $page => $url)
                    		<li class="page-item">
                    			<a class="page-link fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md
                    				{{ $page == $galleryList->currentPage() ? 'bg-primary-600 text-white' : 'bg-neutral-200 text-secondary-light' }}"
                    			   href="{{ $url }}">
                    				{{ $page }}
                    			</a>
                    		</li>
                    	@endforeach
                    
                    	{{-- Next --}}
                    	<li class="page-item {{ $galleryList->hasMorePages() ? '' : 'disabled' }}">
                    		<a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                    		   href="{{ $galleryList->nextPageUrl() ?? 'javascript:void(0)' }}">
                    			<iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                    		</a>
                    	</li>
                    
                    </ul>
                    </div>
                    
                </div>
            </div>

@endsection
