@extends('admin.layout.layout')
@php
    $title='Edit & Update Donation';
    $subTitle = 'Edit & Update Donation';
    $script = '<script src="' . asset('assets/js/editor.highlighted.min.js') . '"></script>
                 <script src="' . asset('assets/js/editor.quill.js') . '"></script>
                 <script src="' . asset('assets/js/editor.katex.min.js') . '"></script>
                 <script>
                 // Editor Js Start
                 const quill = new Quill("#editor", {
                     modules: {
                         syntax: true,
                         toolbar: "#toolbar-container",
                     },
                     placeholder: "Compose an epic...",
                     theme: "snow",
                 });
                 // Editor Js End 
             
             
                 // =============================== Upload Single Image js start here ================================================
                 const fileInput = document.getElementById("upload-file");
                 const imagePreview = document.getElementById("uploaded-img__preview");
                 const uploadedImgContainer = document.querySelector(".uploaded-img");
                 const removeButton = document.querySelector(".uploaded-img__remove");
             
                 fileInput.addEventListener("change", (e) => {
                     if (e.target.files.length) {
                         const src = URL.createObjectURL(e.target.files[0]);
                         imagePreview.src = src;
                         uploadedImgContainer.classList.remove("d-none");
                     }
                 });
                 removeButton.addEventListener("click", () => {
                     imagePreview.src = "";
                     uploadedImgContainer.classList.add("d-none");
                     fileInput.value = "";
                 });
                 // =============================== Upload Single Image js End here ================================================
                 </script>';
@endphp

@section('content')
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="card mt-24">


                    <div class="messages">
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
                        <div class="card-header border-bottom">
                            <h6 class="text-xl mb-0">Edit Donation</h6>
                        </div>
                        <div class="card-body p-24">
                            <form id="myForm" action="{{route('admin.update_guest_donation',$donationDetail->id)}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="d_type">Donation For:<span class="text-danger-600">*</span> </label>
                                    <input type="text" name="d_type" value="{{$donationDetail->d_type}}" class="form-control border border-neutral-200 radius-8" id="d_type">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="donation_amt">Donation Amount: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="donation_amt" value="{{$donationDetail->package_amt}}" class="form-control border border-neutral-200 radius-8" id="amount" placeholder="Donation Amount">
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="donation_date">Donation Date: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="donation_date" value="{{$donationDetail->created_at}}" class="form-control border border-neutral-200 radius-8" id="donation_date" placeholder="Donation Date">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="name">Name: </label>
                                    <input type="text" name="name" value="{{$donationDetail->name}}" class="form-control border border-neutral-200 radius-8" id="uname" placeholder="Enter User Name">
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="phone">Phone: </label>
                                    <input type="text" name="phone" value="{{$donationDetail->phone}}" class="form-control border border-neutral-200 radius-8" id="phone" placeholder="Enter Phone No">
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="email">Email: </label>
                                    <input type="text" name="email" value="{{$donationDetail->email}}" class="form-control border border-neutral-200 radius-8" id="email" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="address">Address: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="address" value="{{$donationDetail->address}}" class="form-control border border-neutral-200 radius-8" id="donation_date" placeholder="Donation Date">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="city">City:<span class="text-danger-600">*</span> </label>
                                    <input type="text" name="city" value="{{$donationDetail->city}}" class="form-control border border-neutral-200 radius-8" id="utr_number">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="state">State: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="state" value="{{$donationDetail->state}}" class="form-control border border-neutral-200 radius-8" id="amount" placeholder="Donation Amount">
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="pincode">Zip Code: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="pincode" value="{{$donationDetail->pincode}}" class="form-control border border-neutral-200 radius-8" id="donation_date" placeholder="Donation Date">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="refrer_code">Refrer Code:<span class="text-danger-600">*</span> </label>
                                    <input type="text" name="refrer_code" value="{{$donationDetail->refrer_code}}" class="form-control border border-neutral-200 radius-8" id="utr_number">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="causes">Causes: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="causes" value="{{$donationDetail->causes}}" class="form-control border border-neutral-200 radius-8" id="causes">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="mb-20">
                                        <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">PAN No. <span class="text-danger-600">*</span> </label>
                                        <input type="text" name="pan_no" value="{{$donationDetail->pan_no}}" class="form-control border border-neutral-200 radius-8" id="pan">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="mb-20">
                                        <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Is Paid <span class="text-danger-600">*</span> </label>
                                        <select class="form-control radius-8 form-select" name="is_paid" id="is_paid">
                                            <option value="0" @if($donationDetail->is_paid==0) selected @endif >No</option>
                                            <option value="1" @if($donationDetail->is_paid==1) selected @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="mb-20">
                                        <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span> </label>
                                        <select class="form-control radius-8 form-select" name="status" id="status">
                                            <option value="1" @if($donationDetail->status==1) selected @endif >Active</option>
                                            <option value="0" @if($donationDetail->status==0) selected @endif>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary-600 radius-8">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

              
            </div>            
@endsection
