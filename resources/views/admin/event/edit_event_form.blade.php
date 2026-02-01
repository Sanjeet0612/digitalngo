@extends('admin.layout.layout')
@php
    $title='Add Event';
    $subTitle = 'Add Event';
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
                        <div class="card-header border-bottom">
                            <h6 class="text-xl mb-0">Add New Event <a href="{{route('admin.manage_event')}}" class="btn btn-primary" style="float:right;">Back</a></h6>
                            
                        </div>
                        <div class="card-body p-24">

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

                            @php $allSponsor = explode(',',$eventdata->sponsor_id); @endphp
                            <form id="myForm" action="{{route('admin.update-event',$eventdata->id)}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <label class="form-label fw-bold text-neutral-900" for="Sponsor">Select Sponsor: </label>
                                    @foreach($sponsor as $sponsorVal)
                                        <div class="col-md-4 mb-3">
                                            <label class="card p-2 cursor-pointer">
                                                <div class="d-flex align-items-center gap-3">
                                                    <input type="checkbox" <?php if(in_array($sponsorVal->id,$allSponsor)){ echo "checked"; } ?> name="sponsors[]" value="{{ $sponsorVal->id }}" class="form-check-input mt-0">
                                                    @if($sponsorVal->sponsor_type=="silver")
                                                        <img src="{{url('/assets/images/silver.png')}}" style="width:25%;">
                                                    @elseif($sponsorVal->sponsor_type=="bronze")
                                                        <img src="{{url('/assets/images/bronze.png')}}" style="width:25%;">
                                                    @else($sponsorVal->sponsor_type=="gold")
                                                        <img src="{{url('/assets/images/gold.png')}}" style="width:25%;"> 
                                                    @endif      
                                                    <div>
                                                        <b class="mb-0">{{ $sponsorVal->name }}</b>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Event Title: </label>
                                    <input type="text" name="event_title" value="{{$eventdata->title}}" class="form-control border border-neutral-200 radius-8" id="title" placeholder="Enter Event Title"  required>
                                </div>
                               
                           
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Organizer Name: </label>
                                    <input type="text" name="organizer_name" value="{{$eventdata->og_name}}" class="form-control border border-neutral-200 radius-8" id="organizer_name" placeholder="Enter Organizer Name" required>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Email Id: </label>
                                    <input type="text" name="emailid" value="{{$eventdata->og_email}}" class="form-control border border-neutral-200 radius-8" id="emailid" placeholder="Enter Email Id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Phone: </label>
                                    <input type="text" name="phone" value="{{$eventdata->og_phone}}" class="form-control border border-neutral-200 radius-8" id="phone" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">Start Date</label>
                                        <input type="date" name="start_date" value="{{ \Carbon\Carbon::parse($eventdata->start_date)->format('Y-m-d') }}"
                                               class="form-control border border-neutral-200 radius-8"
                                               id="start_date" required>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">End Date</label>
                                        <input type="date" name="end_date" value="{{ \Carbon\Carbon::parse($eventdata->end_date)->format('Y-m-d') }}"
                                               class="form-control border border-neutral-200 radius-8"
                                               id="end_date" required>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Event Start-End Time</label>
                                    <input type="text" name="e_time" value="{{$eventdata->e_time}}" class="form-control" placeholder="05:00 AM - 6:00 PM" required>
                                </div>
                                
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Event Address: </label>
                                    <textarea name="address" class="form-control">{{$eventdata->address}}</textarea>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">State</label>
                                        <input type="text" name="state" value="{{$eventdata->state}}"
                                               class="form-control border border-neutral-200 radius-8"
                                               id="state" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900">City</label>
                                        <input type="text" name="city" value="{{$eventdata->city}}"
                                               class="form-control border border-neutral-200 radius-8"
                                               id="city" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Pin Code: </label>
                                        <input type="text" name="zip_code"  value="{{$eventdata->zipcode}}" class="form-control border border-neutral-200 radius-8" id="zip_code" placeholder="Enter Pin code" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-neutral-900" for="title">Web Link: </label>
                                        <input type="url" name="og_weblink" value="{{$eventdata->og_weblink}}" class="form-control border border-neutral-200 radius-8" id="og_weblink" placeholder="e.g, https://abc.com">
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold text-neutral-900" for="title">Location Map (iframe): </label>
                                    <input type="text" name="location" value="{{$eventdata->location}}" class="form-control border border-neutral-200 radius-8" id="location" placeholder="EnterLocation">        
                                </div>                
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
                                                {{strip_tags($eventdata->description)}}
                                            </div>
                                          
                                            <input type="hidden" name="description" id="editdesc">
                                            <!-- Edit End -->
                                        </div>
                                    </div>
                                </div>
 
                                <div>
                                    <label class="form-label fw-bold text-neutral-900">Upload Banner </label>
                                    @if(!empty($eventdata->banner))
                                            <a href="{{asset('storage/'.$eventdata->banner)}}" target="_blank"><img src="{{asset('storage/'.$eventdata->banner)}}" style="width:100px;"></a>
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
                                            <input id="upload-file" type="file" name="event_banner" hidden>
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
                                <h6 class="text-xl mb-0">Latest Events</h6>
                            </div>
                            <div class="card-body d-flex flex-column gap-24 p-24">
                                @foreach($latestEvent as $latestEventVal)            
                                <div class="d-flex flex-wrap">
                                    <a  href="#" class="blog__thumb w-100 radius-12 overflow-hidden">
                                        <img src="{{asset('storage/'.$latestEventVal->banner)}}" alt="" class="w-100 h-100 object-fit-cover">
                                    </a>
                                    <div class="blog__content">
                                        <h6 class="mb-8">
                                            <a  href="" class="text-line-2 text-hover-primary-600 text-md transition-2">{{$latestEventVal->title}}</a>
                                        </h6>
                                        <p class="text-line-2 text-sm text-neutral-500 mb-0">{{strip_tags($latestEventVal->description)}}</p>
                                    </div>
                                </div>
                                @endforeach                
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
@endsection
