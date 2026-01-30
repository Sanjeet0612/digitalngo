@extends('layout.layout')
@php
    $title='Settings';
    $subTitle = 'Settings - NGO';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
                <div class="card-body p-40">
                    <div class="message">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>    

                    <form action="{{url('/')}}/settings" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">NGO Name <span class="text-danger-600">*</span></label>
                                    <input type="text" name="ngoname" required value="{{old('ngoname', $existingDetail->ngoname ?? '')}}" class="form-control radius-8" id="name" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Logo <span class="text-danger-600">*</span></label>
                                    <input type="file" name="ngologo" required class="form-control radius-8" id="ngologo">
                                    <?php
                                    if(!empty($existingDetail->ngologo)){
                                        ?> <img src="{{asset('storage/'.$existingDetail->ngologo)}}" alt="" class="border br-white border-width-2-px w-50-px h-50-px rounded-circle object-fit-cover" ><?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                    <input type="email" name="email" required value="{{old('email', $existingDetail->email ?? '')}}" class="form-control radius-8" id="email" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone Number</label>
                                    <input type="text" name="phone" required value="{{old('phone', $existingDetail->phone ?? '')}}" class="form-control radius-8" id="number" placeholder="Enter phone number">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-20">
                                    <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8"> Address* <span class="text-danger-600">*</span></label>
                                    <input type="text" name="address" required value="{{old('address', $existingDetail->address ?? '')}}" class="form-control radius-8" id="address" placeholder="Enter Your Address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8"> City <span class="text-danger-600">*</span></label>
                                    <input type="text" name="city" required value="{{ old('city', $existingDetail->city ?? '') }}" class="form-control radius-8" id="city" placeholder="City">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="state" class="form-label fw-semibold text-primary-light text-sm mb-8"> State <span class="text-danger-600">*</span></label>
                                    <input type="text" name="state" required value="{{ old('state', $existingDetail->state ?? '') }}" class="form-control radius-8" id="state" placeholder="State">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="zip" class="form-label fw-semibold text-primary-light text-sm mb-8"> Zip Code <span class="text-danger-600">*</span></label>
                                    <input type="text" name="zipcode" required value="{{ old('zipcode', $existingDetail->zipcode ?? '') }}"  class="form-control radius-8" id="zip" placeholder="Zip Code">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="signature" class="form-label fw-semibold text-primary-light text-sm mb-8">Upload Signature <span class="text-danger-600">*</span></label>
                                    <input type="file" name="signature" required  class="form-control radius-8" id="signature">
                                    {{-- Signature --}}
                                    @if(!empty($existingDetail->signature))
                                        <img src="{{ route('signature', basename($existingDetail->signature)) }}" style="width:100px;">
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Save Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection