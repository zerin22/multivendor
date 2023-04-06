@extends('layouts.backend.backend_master')
@section('title', 'Vendor Show')
@section('vendor', 'active')
@section('vendor.create', 'active')

@section('content')
    <div class="mb-3">
        <a href="{{ route('vendor.index') }}" class="btn btn-dark">List Vendor</a>
    </div>
    <div class="row">
        <div class="col-6">
            <table class="table table-bordered border-width-3">
                <tr>
                    <th>Vendor Name</th>
                    <td>{{ $vendor->relationWithUser->name }}</td>
                </tr>
                <tr>
                    <th>Vendor Email</th>
                    <td>{{ $vendor->relationWithUser->email }}</td>
                </tr>
                <tr>
                    <th>Vendor Phone</th>
                    <td>{{ $vendor->relationWithUser->phone }}</td>
                </tr>
                <tr>
                    <th>Vendor Address</th>
                    <td>{{ $vendor->vendor_address }}</td>
                </tr>

                <tr>
                    <th>Vendor Photo</th>
                    <td><img src="{{ asset('uploads/profile_photos') }}/{{ $vendor->relationWithUser->profile_photo }}" width="100"
                            alt=""></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
