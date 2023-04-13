@extends('layouts.backend.backend_master')
@section('title', 'Category Add')
@section('category', 'active')
@section('category.add', 'active')

@section('content')

    <div class="row">
        <div class="col-9 m-auto">
            <div class="content-header">
                <h2 class="content-title">Add New Category</h2>
            </div>
        </div>

        <div class="col-9 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                <form  method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data"  novalidate>
                                    @csrf
                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Category Name*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="category_name" id="title" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" placeholder="Type here" />
                                            @error('category_name')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Category slug*</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                            value="{{ old('slug') }}" placeholder="Type here" />
                                            @error('slug')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Category Tagline*</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="category_tagline" class="form-control @error('category_tagline') is-invalid @enderror" value="{{ old('category_tagline') }}" placeholder="Type here" />
                                            @error('category_tagline')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Category Photo*</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="category_photo" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" class="form-control" />
                                            @error('category_photo')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <img id="img_id" width="450px" height="250px" src="{{ asset('uploads') }}/banner_photos/default-image.jpg" alt="">
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
@section('script')

    <script type="text/javascript">
        $('#title').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-").replace(/\?/g, '-'));
        });
    </script>

@endsection
