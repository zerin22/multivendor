@extends('layouts.backend.backend_master')
@section('title', 'Coupon Add')
@section('coupon', 'active')
@section('coupon.add', 'active')

@section('content')


<div class="row">
    <div class="col-9 m-auto">
        <div class="content-header">
            <h2 class="content-title">Add New Coupon</h2>
        </div>
    </div>

    <div class="col-9 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="row gx-5">
                    <div class="col-lg-9">
                        <section class="content-body p-xl-4">
                            <form  method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data"  novalidate>
                                @csrf
                                <div class="row mb-4 ">
                                    <label class="col-lg-3 col-form-label">Coupon Name*</label>
                                    <div class="col-lg-9 position-relative">
                                        <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" value="{{ old('coupon_name') }}" placeholder="Type here" />
                                        @error('coupon_name')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-4">
                                    <label class="col-lg-3 col-form-label">Coupon Discount*</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror"
                                        value="{{ old('discount') }}" placeholder="Type here" />
                                        @error('discount')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-lg-3 col-form-label">Coupon Validity*</label>
                                    <div class="col-lg-9">
                                        <input type="date" name="validity" class="form-control @error('validity') is-invalid @enderror"
                                        value="{{ old('validity') }}" placeholder="Type here" />
                                        @error('validity')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-lg-3 col-form-label">Coupon Limit*</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="limit" class="form-control @error('limit') is-invalid @enderror"
                                        value="{{ old('limit') }}" placeholder="Type here" />
                                        @error('limit')
                                            <p class="text-danger font-weight-bold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <br />
                                <br />
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

