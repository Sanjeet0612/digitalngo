@extends('admin.layout.layout')
@php
    $title='Add Contact';
    $subTitle = 'Add Contact';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
                <div class="card-body p-40">
                    <form action="{{route('admin.add_contact')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="title" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Title <span class="text-danger-600">*</span></label>
                                    <input type="text" name="title" class="form-control radius-8" id="title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="subtitle" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Subtitle <span class="text-danger-600">*</span></label>
                                    <input type="text" name="subtitle" class="form-control radius-8" id="subtitle">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="joinus" class="form-label fw-semibold text-primary-light text-sm mb-8">Join Us Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="joinus" class="form-control radius-8" id="joinus">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="banner" class="form-label fw-semibold text-primary-light text-sm mb-8">Upload Banner <span class="text-danger-600">*</span></label>
                                    <input type="file" name="banner" class="form-control radius-8" id="banner">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="videourl" class="form-label fw-semibold text-primary-light text-sm mb-8">Video Url Optional (Embedded) <span class="text-danger-600">*</span></label>
                                    <input type="url" name="videourl" class="form-control radius-8" id="videourl">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="bannerurl" class="form-label fw-semibold text-primary-light text-sm mb-8">Banner Link Optional <span class="text-danger-600">*</span></label>
                                    <input type="url" name="bannerurl" class="form-control radius-8" id="bannerurl">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection