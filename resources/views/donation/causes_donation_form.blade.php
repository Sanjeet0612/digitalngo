@extends('layout.layout')
@php
    $title='Causes Donation';
    $subTitle = 'Causes Donation';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
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
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                <div class="card-body p-40">
                    <form action="{{route('donation_for_cause')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cause_id" value="{{$causesData->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-20">
                                    <label for="title" class="form-label fw-semibold text-primary-light mb-8" style="font-size:18px;">Donation For : <span class="text-success">{{$causesData->title}}</span></label>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="amount" class="form-label fw-semibold text-primary-light text-sm mb-8">Donation Amount <span class="text-danger-600">*</span></label>
                                    <input type="text" name="amount" class="form-control radius-8" id="amount" placeholder="Enter Amount">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="utr_num" class="form-label fw-semibold text-primary-light text-sm mb-8">UTR No. <span class="text-danger-600">*</span></label>
                                    <input type="utr_num" name="utrnumber" class="form-control radius-8" id="utr_num" placeholder="Enter UTR Number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="screenshot" class="form-label fw-semibold text-primary-light text-sm mb-8">Upload Screenshot</label>
                                    <input type="file" name="screenshot" class="form-control radius-8" id="screenshot" >
                                </div>
                            </div>
                            

                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <img src="{{ url('/private-image/UPI.jpeg') }}" style="width:50%;">
                                    <h6 >UPI : 9088998800@hdfcbank</h6>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <a href="{{route('manage_causes_donation')}}" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Back
                                </a>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Save Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection