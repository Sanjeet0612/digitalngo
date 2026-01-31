@extends('admin.layout.layout')
@php
    $title='Add Contact';
    $subTitle = 'Add Contact';

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

                    <form action="{{route('admin.add_contact')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="phone" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone No.<span class="text-danger-600">*</span></label>
                                    <input type="text" name="phone" value="{{$contact->phone}}" class="form-control radius-8" id="phone" placeholder="e.g 1234567890 , 1234567899">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="emailid" class="form-label fw-semibold text-primary-light text-sm mb-8">Email Id <span class="text-danger-600">*</span></label>
                                    <input type="text" name="emailid" value="{{$contact->emailid}}" class="form-control radius-8" id="emailid" placeholder="e.g info@abc.com , support@xyz.com">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="workingDays" class="form-label fw-semibold text-primary-light text-sm mb-8">Office Working Day's <span class="text-danger-600">*</span></label>
                                    <input type="text" name="workingDays" value="{{$contact->workingDays}}"  class="form-control radius-8" id="workingDays" placeholder="e.g, Mon-Fri">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="officeTime" class="form-label fw-semibold text-primary-light text-sm mb-8">Office Time <span class="text-danger-600">*</span></label>
                                    <input type="text" name="officeTime" value="{{$contact->officeTime}}" class="form-control radius-8" id="officeTime" placeholder="e.g, 9:00 AM - 19:00 PM">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8">Office Address <span class="text-danger-600">*</span></label>
                                    <input type="text" name="address" value="{{$contact->address}}" class="form-control radius-8" id="address" placeholder="Office Address">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">City <span class="text-danger-600">*</span></label>
                                    <input type="text" name="city"  value="{{$contact->city}}" class="form-control radius-8" id="city" placeholder="City">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="state" class="form-label fw-semibold text-primary-light text-sm mb-8">State <span class="text-danger-600">*</span></label>
                                    <input type="text" name="state" value="{{$contact->state}}"  class="form-control radius-8" id="state" placeholder="State">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="zipcode" class="form-label fw-semibold text-primary-light text-sm mb-8">Zipcode <span class="text-danger-600">*</span></label>
                                    <input type="text" name="zipcode" value="{{$contact->zipcode}}" class="form-control radius-8" id="zipcode" placeholder="zipcode">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="country" class="form-label fw-semibold text-primary-light text-sm mb-8">Country <span class="text-danger-600">*</span></label>
                                    <input type="text" name="country" value="{{$contact->country}}" class="form-control radius-8" id="country" placeholder="Country">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="fb_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Facebook Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="fb_link" value="{{$contact->fb_link}}" class="form-control radius-8" id="fb_link">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="twitter_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Twitter Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="twitter_link" value="{{$contact->twitter_link}}" class="form-control radius-8" id="twitter_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="insta_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Insta Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="insta_link" value="{{$contact->insta_link}}" class="form-control radius-8" id="insta_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="behance_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Behance Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="behance_link" value="{{$contact->behance_link}}" class="form-control radius-8" id="behance_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="youtube_link" class="form-label fw-semibold text-primary-light text-sm mb-8">Youtube Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="youtube_link"  value="{{$contact->youtube_link}}" class="form-control radius-8" id="youtube_link">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="copyright" class="form-label fw-semibold text-primary-light text-sm mb-8">@ Copyright  <span class="text-danger-600">*</span></label>
                                    <input type="text" name="copyright" value="{{$contact->copyright}}" class="form-control radius-8" id="copyright" placeholder="e.g ABC Foundation 2022-2026.">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="created_by" class="form-label fw-semibold text-primary-light text-sm mb-8">Created by <span class="text-danger-600">*</span></label>
                                    <input type="text" name="created_by" value="{{$contact->created_by}}" class="form-control radius-8" id="created_by" placeholder="e.g ABC Digital Solutions Pvt. Ltd.">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="created_by_url" class="form-label fw-semibold text-primary-light text-sm mb-8">Created by Link <span class="text-danger-600">*</span></label>
                                    <input type="url" name="created_by_url" value="{{$contact->created_by_url}}" class="form-control radius-8" id="created_by_url" placeholder="e.g http://example.com">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span> </label>
                                    <select class="form-control radius-8 form-select" name="status" id="status">
                                        <option value="1" @if($contact->status==1) selected @endif>Active</option>
                                        <option value="0"  @if($contact->status==0) selected @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <a href="{{route('admin.manage_contact')}}" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Back
                                </a>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection