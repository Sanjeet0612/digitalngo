@extends('admin.layout.layout')
@php
    $title='Edit & Update Causes';
    $subTitle = 'Edit & Update Causes Category';
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
                            <h6 class="text-xl mb-0">Add New Category</h6>
                        </div>
                        <div class="card-body p-24">
                            <form id="myForm" action="{{route('admin.update_causes_category',$causeCatData->id)}}" method="post" class="d-flex flex-column gap-20" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Select Category : </label>
                                    <input type="text" name="cat_name" value="{{$causeCatData->cat_name}}" class="form-control border border-neutral-200 radius-8" id="cat_name" placeholder="Enter Category Name">
                                </div>
                                
                               <div>
                                    <label class="form-label fw-bold text-neutral-900" for="title">Category Name: </label>
                                    <select name="status" class="form-control" id="status" >
                                    <option value="1" @if($causeCatData->status==1) selected @endif >Active</option>
                                    <option value="0" @if($causeCatData->status==0) selected @endif >Deactive</option>
                                    </select>
                                </div>
                               
                                <button type="submit" class="btn btn-primary-600 radius-8">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>            
@endsection
