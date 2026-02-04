@extends('admin.layout.layout')
@php
    $title='Add Blog';
    $subTitle = 'Add Blog';
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
                <div class="col-lg-8">
                    <div class="card mt-24">

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


                        <div class="card-header border-bottom">
                            <h6 class="text-xl mb-0">Add New Post</h6>
                        </div>
                        <div class="card-body p-24">
                            <form id="myForm" action="{{route('admin.add_articles')}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Post Title: </label>
                                    <input type="text" name="title" class="form-control border border-neutral-200 radius-8" id="title" placeholder="Enter Post Title">
                                </div>
                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Post Category: </label>
                                    <select name="category" class="form-control border border-neutral-200 radius-8">
                                        <option value="">Select Category</option>
                                        <option value="technology">Technology</option>
                                        <option value="business">Business</option>
                                        <option value="course">Course</option>
                                        <option value="fashion">Fashion</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Tags: </label>
                                    <input type="text" name="tags" class="form-control border border-neutral-200 radius-8" id="title" placeholder="Enter Blog Tag">
                                </div>
                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Post Description </label>
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
                                            <div id="editor"></div>
                                            <input type="hidden" name="description" id="editdesc">
                                            <!-- Edit End -->
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Upload Thumbnail </label>
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
                                            <input id="upload-file" type="file" name="bgimage" hidden>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary-600 radius-8">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <div class="d-flex flex-column gap-24">
                        <!-- Latest Blog -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h6 class="text-xl mb-0">My Blogs</h6>
                            </div>
                            <div class="card-body d-flex flex-column gap-24 p-24">
                                @foreach($blogs as $blogsVal)
                                 <div class="d-flex flex-wrap">
                                    <a  href="{{route('details', $blogsVal->slug)}}" class="blog__thumb w-100 radius-12 overflow-hidden">
                                        @if(!empty($blogsVal->bgimage))
                                        <img src="{{asset('storage/'.$blogsVal->bgimage)}}" alt="" class="w-100 h-100 object-fit-cover">
                                        @else
                                        <img src="{{ asset('assets/images/user-grid/NGOBanner.png') }}" alt="" class="w-100 h-100 object-fit-cover">
                                        @endif
                                    </a>
                                    <div class="blog__content">
                                        <h6 class="mb-8">
                                            <a  href="{{route('details', $blogsVal->slug)}}" class="text-line-2 text-hover-primary-600 text-md transition-2">{{$blogsVal->title}}</a>
                                        </h6>
                                        <p class="text-line-2 text-sm text-neutral-500 mb-0">{{strip_tags($blogsVal->description)}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
@endsection
