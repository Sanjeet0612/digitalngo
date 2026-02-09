@extends('admin.layout.layout')
@php
    $title='Edit & Update Causes';
    $subTitle = 'Edit & Update Causes';
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
                            <h6 class="text-xl mb-0">Add New Causes</h6>
                        </div>
                        <div class="card-body p-24">
                            <form id="myForm" action="{{route('admin.update_cause',$causesData->id)}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Cause Title:<span class="text-danger-600">*</span> </label>
                                    <input type="text" name="title" value="{{$causesData->title}}" class="form-control border border-neutral-200 radius-8" id="title" placeholder="Enter Title">
                                </div>

                                
                                 <div class="col-sm-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Category:<span class="text-danger-600">*</span> </label>
                                    <select  name="cat_name" class="form-control border border-neutral-200 radius-8" id="cat_name" >
                                        @foreach($category as $categoryVal)
                                        <option value="{{$categoryVal->id}},{{$categoryVal->slug}}" @if($causesData->causes_cat_id==$categoryVal->id) selected @endif>{{$categoryVal->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Name: </label>
                                    <input type="text" name="name" value="{{$causesData->name}}" class="form-control border border-neutral-200 radius-8" id="uname" placeholder="Enter User Name">
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Phone: </label>
                                    <input type="text" name="phone" value="{{$causesData->phone}}" class="form-control border border-neutral-200 radius-8" id="phone" placeholder="Enter Phone No">
                                </div>

                                <div class="col-sm-4">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Email: </label>
                                    <input type="text" name="email" value="{{$causesData->email}}" class="form-control border border-neutral-200 radius-8" id="email" placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Total Amount: <span class="text-danger-600">*</span> </label>
                                    <input type="text" name="tot_amt" value="{{$causesData->tot_amt}}" class="form-control border border-neutral-200 radius-8" id="amount" placeholder="Enter Amount">
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-20">
                                        <label for="status" class="form-label fw-semibold text-primary-light text-sm mb-8">Status <span class="text-danger-600">*</span> </label>
                                        <select class="form-control radius-8 form-select" name="status" id="status">
                                            <option value="1" @if($causesData->status==1) selected @endif >Active</option>
                                            <option value="0" @if($causesData->status==0) selected @endif>Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Start Date: <span class="text-danger-600">*</span> </label>
                                    <input type="date" name="start_date" value="{{$causesData->start_date}}" class="form-control border border-neutral-200 radius-8" id="start_date" placeholder="Start Date">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">End Date: <span class="text-danger-600">*</span> </label>
                                    <input type="date" name="end_date" value="{{$causesData->end_date}}" class="form-control border border-neutral-200 radius-8" id="end_date" placeholder="End Date">
                                </div>
                            </div>
                                
                               
                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Description </label>
                                    <div class="border border-neutral-200 radius-8 overflow-hidden">
                                        <div class="height-200">
                                            <!-- Editor Toolbar Start -->
                                            <div id="toolbar-container">
                                                <span class="ql-formats">
                                                    <select class="ql-font"></select>
                                                    <select class="ql-size"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <select class="ql-color"></select>
                                                    <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-script" value="sub"></button>
                                                    <button class="ql-script" value="super"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-header" value="1"></button>
                                                    <button class="ql-header" value="2"></button>
                                                    <button class="ql-blockquote"></button>
                                                    <button class="ql-code-block"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-list" value="ordered"></button>
                                                    <button class="ql-list" value="bullet"></button>
                                                    <button class="ql-indent" value="-1"></button>
                                                    <button class="ql-indent" value="+1"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-direction" value="rtl"></button>
                                                    <select class="ql-align"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-link"></button>
                                                    <button class="ql-image"></button>
                                                    <button class="ql-video"></button>
                                                    <button class="ql-formula"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-clean"></button>
                                                </span>
                                            </div>
                                            <!-- Editor Toolbar Start -->

                                            <!-- Editor start -->
                                            <div id="editor">{!! $causesData->description !!}</div>
                                            <input type="hidden" name="description" id="editdesc">
                                            <!-- Edit End -->
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Upload Image (500 Kb)  <span class="text-danger-600">*</span></label>
                                    @if(!empty($causesData->banner))
                                        <img src="{{asset('storage/'.$causesData->banner)}}" style="width:100px;">
                                    @endif
                                    <div class="upload-image-wrapper">
                                        <div class="uploaded-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                            <button type="button" class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                            </button>
                                            <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover" src="{{ asset('assets/images/user.png') }}" alt="image">
                                        </div>
                                        <label class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file">
                                            <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file" type="file" name="banner" hidden>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary-600 radius-8">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

              
            </div>            
@endsection
