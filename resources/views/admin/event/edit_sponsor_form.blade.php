@extends('admin.layout.layout')
@php
    $title='Update Sponsor';
    $subTitle = 'Update Sponsor';
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
                        <div class="card-header border-bottom">
                            <h6 class="text-xl mb-0">Add New Sponsor</h6>
                        </div>
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
                        
                        <div class="card-body p-24">
                            <form id="myForm" action="{{route('admin.add-sponsor')}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Sponsor Type: </label>
                                    <select name="sponsor_type" class="form-control border border-neutral-200 radius-8">
                                        <option value="bronze">Bronze</option>
                                        <option value="silver">Silver</option>
                                        <option value="gold">Gold</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Sponsor Name: </label>
                                    <input type="text" name="sponsor_name" class="form-control border border-neutral-200 radius-8" id="sponsor_name" placeholder="Enter Sponsor Name"  required>
                                </div>
                               
                           
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Email id: </label>
                                    <input type="text" name="emailid" class="form-control border border-neutral-200 radius-8" id="emailid" placeholder="Enter Email Id" required>
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Phone: </label>
                                    <input type="text" name="phone" class="form-control border border-neutral-200 radius-8" id="phone" placeholder="Enter Phone Number" required>
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Address: </label>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">City</label>
                                        <input type="text" name="city" class="form-control border border-neutral-200 radius-8"id="city">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">State</label>
                                        <input type="text" name="state" class="form-control border border-neutral-200 radius-8" id="state">    
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Pin Code: </label>
                                    <input type="text" name="zip_code" class="form-control border border-neutral-200 radius-8" id="zip_code" placeholder="Enter Pin code">
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Logo: </label>
                                    <input type="file" name="logo" class="form-control border border-neutral-200 radius-8" id="logo" >
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Website url: </label>
                                    <input type="url" name="weburl" class="form-control border border-neutral-200 radius-8" id="weburl" placeholder="Enter web url">
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Event Description </label>
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
                                            <div id="editor">
                                                <p class=""></p>
                                            </div>
                                          
                                            <input type="hidden" name="description" id="editdesc">
                                            <!-- Edit End -->
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
