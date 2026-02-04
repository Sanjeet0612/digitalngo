@extends('admin.layout.layout')
@php
    $title='Add Videos';
    $subTitle = 'Add Add Videos';

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
                    <form action="{{route('admin.add_video')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div id="category-wrapper" class="photoo">
                                <div class="row category-row align-items-end mb-3">
                                    <div class="col-sm-6" >
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Youtube Embed Code <span class="text-danger-600">*</span>
                                        </label>
                                        <input type="text" name="embedCode" multiple class="form-control radius-8" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Status <span class="text-danger-600">*</span>
                                        </label>
                                        <select class="form-control radius-8 form-select" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
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
    if(valueType ==='video'){
        $('.photoo').hide();
         $('.video').show();
    }
    if(valueType ==='photo'){
        $('.photoo').show();
        $('.video').hide();
    }
}
</script>
