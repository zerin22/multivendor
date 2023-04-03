@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Banner</li>
    </ol><br>
    <h4 class="page-title">List Banner </h4>
@endsection

@section('content')
    <a href="{{ route('banner.create') }}" class="mb-3 btn btn-dark">Add Banner</a>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discount</th>
                        <th scope="col">validity</th>
                        <th scope="col">limit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coupons as $coupon)
                        <tr>
                            <th>{{ $loop->index+1 }}</th>
                            <td>{{ $coupon->coupon_name }}%</td>
                            <td>{{ $coupon->discount }}</td>
                            <td>{{ $coupon->validity }}</td>
                            <td>{{ $coupon->limit }}</td>
                            <td>
                                <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('coupon.destroy', $coupon->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-dark">No Record</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
