@extends('layouts.backend.backend_master')
@section('title', 'Banner Update')
@section('banner', 'active')
@section('banner.index', 'active')

@section('content')

    <div class="row">
        <div class="col-9 m-auto">
            <div class="content-header">
                <h2 class="content-title">Update Banner</h2>
            </div>
        </div>

        <div class="col-9 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                <form  method="POST" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data"  novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Banner Heading*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="banner_heading" class="form-control @error('banner_heading') is-invalid @enderror" value="{{ $banner->banner_heading }}" placeholder="Type here" />
                                            @error('banner_heading')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Banner offer %*</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="banner_offer" class="form-control @error('banner_offer') is-invalid @enderror"
                                            value="{{ $banner->banner_offer }}" placeholder="Type here" />
                                            @error('banner_offer')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Banner Photo*</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="new_banner_photo" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" class="form-control" />
                                            @error('new_banner_photo')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <img id="img_id" width="450px" height="250px"src="{{ asset('uploads/banner_photos' . '/' . $banner->banner_photo) }}" alt="">
                                    <br />
                                    <br />
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
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
    </div>
@endsection
