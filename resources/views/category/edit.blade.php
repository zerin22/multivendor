@extends('layouts.backend.backend_master')
@section('title', 'Category Update')
@section('category', 'active')
@section('category.index', 'active')

@section('content')
    <div class="row">
        <div class="col-8">
            <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_name">Category Status {{ $category->status }}</label>
                    <select name="status" id="" class="form-control">
                        <option value="show" {{ $category->status == 'show' ? 'selected' : '' }}>
                            Show</option>
                        <option value="hide" {{ $category->status == 'hide' ? 'selected' : '' }}>Hide</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" id="title" class="form-control" id="category_name" name="category_name"
                        value="{{ $category->category_name }}">
                </div>
                <div class="form-group">
                    <label for="category_name">Category slug</label>
                    <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ $category->slug }}">
                </div>
                <div class="form-group">
                    <label for="category_tagline">Category Tagline</label>
                    <input type="text" class="form-control" id="category_tagline" name="category_tagline"
                        value="{{ $category->category_tagline }}">
                </div>
                <div class="form-group">
                    <label>Old Category Photo</label>
                    <img src="{{ asset('uploads/category_photos' . '/' . $category->category_photo) }}" width="200">
                </div>
                <div class="form-group">
                    <label>New Category Photo</label>
                    <input type="file" class="form-control" name="new_category_photo">
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection


@section('footer_script')

    <script type="text/javascript">
        $('#title').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-").replace(/\?/g, '-'));
        });
    </script>

@endsection
