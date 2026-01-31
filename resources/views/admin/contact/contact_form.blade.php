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
                                    <label for="phone" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone No.<span class="text-danger-600">*</span></label>
                                    <input type="text" name="phone" class="form-control radius-8" id="phone" placeholder="e.g 1234567890 , 1234567899">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="emailid" class="form-label fw-semibold text-primary-light text-sm mb-8">Email Id <span class="text-danger-600">*</span></label>
                                    <input type="text" name="emailid" class="form-control radius-8" id="emailid" placeholder="e.g info@abc.com , support@xyz.com">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="workingDays" class="form-label fw-semibold text-primary-light text-sm mb-8">Office Working Day's <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="workingDays" id="workingDays">
                                        <sption value="">Select Working Day's</option>
                                        <option value="Mon-Sat">Mon-Sat</option>
                                        <option value="Mon-Fri">Mon-Fri</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="WFH">WFH</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="officeTime" class="form-label fw-semibold text-primary-light text-sm mb-8">Office Time <span class="text-danger-600">*</span></label>
                                    <input type="url" name="officeTime" class="form-control radius-8" id="officeTime" placeholder="e.g, 9:00 AM - 19:00 PM">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8">Office Address <span class="text-danger-600">*</span></label>
                                    <input type="text" name="address" class="form-control radius-8" id="address" placeholder="Office Address">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">City <span class="text-danger-600">*</span></label>
                                    <input type="text" name="city" class="form-control radius-8" id="city" placeholder="City">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="state" class="form-label fw-semibold text-primary-light text-sm mb-8">State <span class="text-danger-600">*</span></label>
                                    <input type="text" name="state" class="form-control radius-8" id="state" placeholder="State">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="zipcode" class="form-label fw-semibold text-primary-light text-sm mb-8">Zipcode <span class="text-danger-600">*</span></label>
                                    <input type="text" name="zipcode" class="form-control radius-8" id="zipcode" placeholder="zipcode">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="country" class="form-label fw-semibold text-primary-light text-sm mb-8">Country <span class="text-danger-600">*</span></label>
                                    <input type="text" name="country" class="form-control radius-8" id="country" placeholder="Country">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="fb_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Facebook Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="fb_link" class="form-control radius-8" id="fb_link">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="twitter_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Twitter Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="twitter_link" class="form-control radius-8" id="twitter_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="insta_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Insta Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="insta_link" class="form-control radius-8" id="insta_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="behance_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Behance Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="behance_link" class="form-control radius-8" id="behance_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="youtube_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Youtube Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="youtube_link" class="form-control radius-8" id="youtube_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="copyright" class="form-label fw-semibold text-primary-light text-sm mb-8">@ Copyright  <span class="text-danger-600">*</span></label>
                                    <input type="url" name="copyright" class="form-control radius-8" id="copyright" placeholder="e.g ABC Foundation 2022-2026.">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="created_by" class="form-label fw-semibold text-primary-light text-sm mb-8">Created by <span class="text-danger-600">*</span></label>
                                    <input type="url" name="created_by" class="form-control radius-8" id="created_by" placeholder="e.g ABC Digital Solutions Pvt. Ltd.">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="created_by_url" class="form-label fw-semibold text-primary-light text-sm mb-8">Created by Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="created_by_url" class="form-control radius-8" id="created_by_url" placeholder="e.g http://example.com">
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