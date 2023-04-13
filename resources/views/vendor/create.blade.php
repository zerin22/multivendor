@extends('layouts.backend.backend_master')
@section('title', 'Vendor Add')
@section('vendor', 'active')
@section('vendor.create', 'active')

@section('content')

    <div class="row">
        <form  method="POST" action="{{ route('vendor.store') }}" enctype="multipart/form-data"  novalidate>
            @csrf
        <div class="col-9 m-auto">
            <div class="content-header">
                <h2 class="content-title">Add New Vendor</h2>

                <div>
                    <input class="btn btn-light rounded font-sm mr-5 text-body hover-up" type="submit" value="Save to draft" name="inactive">
                    <input class="btn btn-md rounded font-sm hover-up" type="submit" value="Publish" name="active">
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
                                            <input type="text" name="vendor_name" class="form-control @error('vendor_name') is-invalid @enderror" placeholder="Type here" />
                                            @error('vendor_name')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Vendor Email*</label>
                                        <div class="col-lg-9">
                                            <input type="email" name="vendor_email" class="form-control @error('vendor_email') is-invalid @enderror" placeholder="Type here" />
                                            @error('vendor_email')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Phone No</label>
                                        <div class="col-lg-4">
                                            <input type="number" name="vendor_phone_number" class="form-control @error('vendor_phone_number') is-invalid @enderror" placeholder="012345678" />
                                            @error('vendor_phone_number')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Vendor Address*</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="vendor_address" class="form-control @error('vendor_address') is-invalid @enderror"  placeholder="Type here" />
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
                <!-- card body end// -->
            </div>
        </div>
    </form>
    </div>

@endsection


