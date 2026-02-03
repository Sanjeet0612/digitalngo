@extends('admin.layout.layout')
@php
    $title='Update Management Team';
    $subTitle = 'Update Management Team';
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
                            <h6 class="text-xl mb-0">Add New</h6>
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
                            <form id="myForm" action="{{route('admin.update-management-team',$detail->id)}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Name: </label>
                                        <input type="text" name="m_name" value="{{old('m_name', $detail->m_name)}}"  class="form-control border border-neutral-200 radius-8" id="sponsor_name" placeholder="Enter Name"  required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Designation: </label>
                                        <input type="text" name="designation" value="{{old('designation', $detail->designation)}}"  class="form-control border border-neutral-200 radius-8" id="designation" placeholder="Enter Designation" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Email id: </label>
                                        <input type="text" name="emailid" value="{{old('emailid', $detail->emailid)}}" class="form-control border border-neutral-200 radius-8" id="emailid" placeholder="Enter Email Id">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Phone: </label>
                                        <input type="text" name="phone"  value="{{old('phone', $detail->phone)}}" class="form-control border border-neutral-200 radius-8" id="phone" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Address: </label>
                                        <textarea name="address" class="form-control"> {{old('address', $detail->address)}}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Team Type: </label>
                                        <select name="team_type" class="form-control">
                                            <option value="management" @if($detail->team_type=='management') selected @endif>Management</option>
                                            <option value="governing"  @if($detail->team_type=='governing') selected @endif>Governing</option>
                                            <option value="volunteer"  @if($detail->team_type=='volunteer') selected @endif>Volunteer</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">City</label>
                                        <input type="text" name="city"  value="{{old('city', $detail->city)}}" value="{{$detail->city}}" class="form-control border border-neutral-200 radius-8"id="city">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">State</label>
                                        <input type="text" name="state"  value="{{old('state', $detail->state)}}" value="{{$detail->state}}" class="form-control border border-neutral-200 radius-8" id="state">    
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Pin Code: </label>
                                    <input type="text" name="zip_code" value="{{old('zip_code', $detail->zip_code)}}" class="form-control border border-neutral-200 radius-8" id="zip_code" placeholder="Enter Pin code">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Profile Image: </label>
                                    <input type="file" name="profile_img" class="form-control border border-neutral-200 radius-8" id="profile_img" >
                                    @if(!empty($detail->profile_img))
                                        <img src="{{asset('storage/'.$detail->profile_img)}}" style="width:100px;">
                                    @endif
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                       <label class="form-label fw-bold text-neutral-900" for="title">Facebook Link: </label>
                                        <input type="url" value="{{old('fb_link', $detail->fb_link)}}" name="fb_link"  class="form-control border border-neutral-200 radius-8" id="fb_link" > 
                                    </div>
                                    <div class="col-md-6">
                                       <label class="form-label fw-bold text-neutral-900" for="title">Twitter Link: </label>
                                        <input type="url" value="{{old('twt_link', $detail->twt_link)}}" name="twt_link" class="form-control border border-neutral-200 radius-8" id="twt_link" > 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                       <label class="form-label fw-bold text-neutral-900" for="title">InstaGram Link: </label>
                                        <input type="url" value="{{old('insta_link', $detail->insta_link)}}"  name="insta_link" class="form-control border border-neutral-200 radius-8" id="insta_link" > 
                                    </div>
                                    <div class="col-md-6">
                                       <label class="form-label fw-bold text-neutral-900" for="title">Status: </label>
                                        <select name="status" class="form-control">
                                            <option value="1" @if($detail->status==1) selected @endif>Active</option>
                                            <option value="0" @if($detail->status==0) selected @endif>Deactive</option>
                                        </select>
                                    </div>
                                </div>    
                                <div>
                                    <label class="form-label fw-bold text-neutral-900"> Description </label>
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
                                                {!! $detail->description !!}
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
