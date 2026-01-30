@extends('admin.layout.layout')
@php
    $title='Update Banner';
    $subTitle = 'Update Banner';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
                <div class="card-body p-40">
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
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                    <form action="{{route('admin.update_banner', $banner->id)}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="title" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Title <span class="text-danger-600">*</span></label>
                                    <input type="text" name="title" value="{{$banner->title}}" class="form-control radius-8" id="title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="subtitle" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Subtitle <span class="text-danger-600">*</span></label>
                                    <input type="text" name="subtitle" value="{{$banner->subtitle}}" class="form-control radius-8" id="subtitle">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="joinus" class="form-label fw-semibold text-primary-light text-sm mb-8">Join Us Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="joinus" value="{{$banner->joinus_link}}" class="form-control radius-8" id="joinus">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="banner" class="form-label fw-semibold text-primary-light text-sm mb-8">Upload Banner <span class="text-danger-600">*</span></label>
                                    <input type="file" name="banner" class="form-control radius-8" id="banner">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/'.$banner->image_link) }}" alt="" class="w-100-px h-70-px  flex-shrink-0 me-12 overflow-hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="videourl" class="form-label fw-semibold text-primary-light text-sm mb-8">Video Url Optional (Embedded) <span class="text-danger-600">*</span></label>
                                    <input type="url" name="videourl" value="{{$banner->video_link}}" class="form-control radius-8" id="videourl">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="bannerurl" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Link Optional <span class="text-danger-600">*</span></label>
                                    <input type="url" name="bannerurl" value="{{$banner->redirect_link}}" class="form-control radius-8" id="bannerurl">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="position" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Position <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="sort_order" id="position">
                                        <option value="0">Select Position</option>
                                        @for($p = 1; $p <= 10; $p++)
                                            <option value="{{ $p }}" @if($banner->sort_order==$p) selected @endif>{{ $p }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="status" id="status">
                                        <option value="1" @if($banner->status==1) selected @endif >Active</option>
                                        <option value="0" @if($banner->status==0) selected @endif >Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection