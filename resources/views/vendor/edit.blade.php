@extends('layouts.backend.backend_master')
@section('title', 'Vendor Update')
@section('vendor', 'active')
@section('vendor.index', 'active')

@section('content')
    <div class="row">
        <form  method="POST" action="{{ route('vendor.update', $vendor->id) }}" enctype="multipart/form-data"  novalidate>
        @csrf
        @method('PUT')
        <div class="col-9 m-auto">
            <div class="content-header">
                <h2 class="content-title">Update Vendor</h2>

                <div>
                    <input class="rounded font-sm mr-5  hover-up
                    @if($vendor->status == 'inactive')
                    btn btn-md text-white
                    @else
                    btn btn-light
                    @endif"
                    type="submit" value="Save to draft" name="inactive">

                    <input class="rounded font-sm hover-up
                    @if($vendor->status == 'active')
                    btn btn-md text-white
                    @else
                    btn btn-light
                    @endif"
                    type="submit" value="Publish" name="active">
                </div>
            </div>
        </div>
        <div class="col-9 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Vendor name*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="vendor_name" value="{{ $vendor->relationWithUser->name }}" class="form-control @error('vendor_name') is-invalid @enderror" placeholder="Type here" />
                                            @error('vendor_name')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Vendor Email*</label>
                                        <div class="col-lg-9">
                                            <input type="email" name="vendor_email" value="{{ $vendor->relationWithUser->email }}" class="form-control @error('vendor_email') is-invalid @enderror" placeholder="Type here" />
                                            @error('vendor_email')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Phone No</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="vendor_phone_number" value="{{ $vendor->relationWithUser->phone }}" class="form-control @error('vendor_phone_number') is-invalid @enderror" placeholder="012345678" />
                                            @error('vendor_phone_number')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Vendor Address*</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="vendor_address" value="{{ $vendor->vendor_address }}" class="form-control @error('vendor_address') is-invalid @enderror"  placeholder="Type here" />
                                            @error('vendor_address')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <br />
                                    {{-- <button class="btn btn-primary" type="submit">Continue to next</button> --}}
                            </section>
                            <!-- content-body .// -->
                        </div>
                        <!-- col.// -->
                    </div>
                    <!-- row.// -->
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection

