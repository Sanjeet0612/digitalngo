@extends('admin.layout.layout')
@php
    $title='Edit Update Iamges';
    $subTitle = 'Edit Picture/Video Iamges';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
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
                <div class="card-body p-40">
                    <form action="{{route('admin.update_picture',$galdetail->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-sm-6">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Type<span class="text-danger-600">*</span>
                                </label>
                                <select name="gtype" class="form-control" onchange="return showHide(this.value)">
                                    <option value="">Select Type</option>
                                    <option value="photo" @if($galdetail->gtype=='photo') selected @endif >Picture</option>
                                    <option value="video" @if($galdetail->gtype=='video') selected @endif >Video</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Category<span class="text-danger-600">*</span>
                                </label>
                                <select name="cat_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($allCat as $allCatVal)
                                        <option value="{{$allCatVal->id}}" @if($galdetail->cat_id==$allCatVal->id) selected @endif >{{$allCatVal->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>    


                            <div id="category-wrapper">
                                <div class="row category-row align-items-end mb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Upload Image/Video <span class="text-danger-600">*</span>
                                            @if(!empty($galdetail->path))
                                                <img src="{{asset('storage/'.$galdetail->path)}}" style="width:100px;">
                                            @endif
                                        </label>
                                        <input type="file" name="picture[]" multiple class="form-control radius-8">
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Status <span class="text-danger-600">*</span>
                                        </label>
                                        <select class="form-control radius-8 form-select" name="status">
                                            <option value="1"  @if($galdetail->status==1) selected @endif >Active</option>
                                            <option value="0" @if($galdetail->status==0) selected @endif >Deactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-2 text-end">
                                        <button type="button" class="btn btn-success add-row">+</button>
                                    </div>
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

<script>
function showHide(valueType){
    alert(valueType);
}
</script>

