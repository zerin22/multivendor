@extends('layouts.backend.backend_master')
@section('title', 'Settings Update')
@section('setting', 'active')

@section('content')

    <div class="row">
        <div class="col-9 m-auto">
            <div class="content-header">
                <h2 class="content-title">Update Setting</h2>
            </div>
        </div>

        <div class="col-9 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col-lg-9">
                            <section class="content-body p-xl-4">
                                <form  method="POST" action="{{ route('setting.update', $setting->id) }}" enctype="multipart/form-data"  novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Facebook Link*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="url" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ $setting->facebook }}" placeholder="Type here" />
                                            @error('facebook')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">LinkedIn Link*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="url" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ $setting->linkedin }}" placeholder="Type here" />
                                            @error('linkedin')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Twitter Link*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ $setting->twitter }}" placeholder="Type here" />
                                            @error('twitter')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Instagram Link*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="url" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ $setting->instagram }}" placeholder="Type here" />
                                            @error('instagram')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Store Address*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="store_address" class="form-control @error('store_address') is-invalid @enderror" value="{{ $setting->store_address }}" placeholder="Type here" />
                                            @error('store_address')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Store Email*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="email" name="store_email" class="form-control @error('store_email') is-invalid @enderror" value="{{ $setting->store_email }}" placeholder="Type here" />
                                            @error('store_email')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Store Phone*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="store_phone" class="form-control @error('store_phone') is-invalid @enderror" value="{{ $setting->store_phone }}" placeholder="Type here" />
                                            @error('store_phone')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Footer Desceiption*</label>
                                        <div class="col-lg-9 position-relative">
                                            <textarea type="text" name="footer_description" class="form-control @error('footer_description') is-invalid @enderror" value="" placeholder="Type here">{{ $setting->footer_description }}</textarea>
                                            @error('footer_description')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Meta Title*</label>
                                        <div class="col-lg-9 position-relative">
                                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ $setting->meta_title }}" placeholder="Type here" />
                                            @error('meta_title')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4 ">
                                        <label class="col-lg-3 col-form-label">Meta Desceiption*</label>
                                        <div class="col-lg-9 position-relative">
                                            <textarea type="text" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" value="" placeholder="Type here">{{ $setting->meta_description }}</textarea>
                                            @error('meta_description')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Header Logo*(125px X 30px)</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="logo_header" onchange="document.getElementById('img_id2').src=window.URL.createObjectURL(this.files[0])" class="form-control" />
                                            @error('logo_header')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Header Logo</label>
                                        <div class="col-lg-9">
                                            <img id="img_id2" width="125px" height="30px"src="{{ asset($setting->logo_header) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">New Footer Logo (125px X 30px)</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="logo_footer" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" class="form-control" />
                                            @error('logo_footer')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Footer Logo</label>
                                        <div class="col-lg-9 pt-1" style="background: #57585e">
                                            <img id="img_id" width="125px" height="30px"src="{{ asset($setting->logo_footer) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Favicon (16px X 16px)</label>
                                        <div class="col-lg-9">
                                            <input type="file" name="favicon" onchange="document.getElementById('img_id3').src=window.URL.createObjectURL(this.files[0])" class="form-control" />
                                            @error('favicon')
                                                <p class="text-danger font-weight-bold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label">Favicon</label>
                                        <div class="col-lg-9">
                                            <img id="img_id3" width="20px" height="20px"src="{{ asset($setting->favicon) }}" alt="">
                                        </div>
                                    </div>

                                    <br />
                                    <br />
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
