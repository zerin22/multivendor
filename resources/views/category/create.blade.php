@extends('layouts.backend.backend_master')
@section('title', 'Category Add')
@section('category', 'active')
@section('category.add', 'active')

@section('content')
    <div class="mb-3">
        <a href="{{ route('category.index') }}" class="btn btn-dark">Category List</a>
    </div>
    <div class="row">
        <div class="col-8">
            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" id="title" class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                        name="category_name" value="{{ old('category_name') }}">
                </div>
                @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="category_name">Category slug</label>
                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug') }}">
                </div>
                @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="category_tagline">Category Tagline</label>
                    <input type="text" class="form-control @error('category_tagline') is-invalid @enderror"
                        id="category_tagline" name="category_tagline" value="{{ old('category_tagline') }}">
                </div>
                @error('category_tagline')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Category Photo</label>
                    <input type="file" class="form-control @error('category_photo') is-invalid @enderror"
                        id="category_photo" name="category_photo" value="{{ old('category_photo') }}">
                </div>
                <div>
                    <img width="200" id="output">
                </div>
                @error('category_photo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
