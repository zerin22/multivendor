@extends('layouts.backend.backend_master')
@section('title', 'Coupon List')
@section('coupon', 'active')
@section('coupon.index', 'active')

@section('content')

    <div class="content-header">
        <h2 class="content-title">Coupon List</h2>
        <div>
            <a href="{{ route('coupon.create') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Add Coupon</a>
        </div>
    </div>

    <div class="card">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text"  placeholder="Search..." class="form-control table_search" />
                </div>
        </header>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Discount</th>
                            <th scope="col">validity</th>
                            <th scope="col">Limit</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coupons as $coupon)
                            <tr>
                                <td scope="row">{{ $loop->index+1 }}</td>
                                <td>{{ $coupon->coupon_name }}</td>
                                <td>{{ $coupon->discount }}</td>
                                <td>{{ $coupon->validity }}</td>
                                <td>{{ $coupon->limit }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('coupon.edit', $coupon->id) }}">Edit info</a>
                                            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal__{{ $coupon->id }}">Delete</a>
                                        </div>
                                    </div>

                                    @push('modal')
                                        <div class="modal fade" id="exampleModal__{{ $coupon->id }}" tabindex="-1" aria-labelledby="exampleModal__{{ $coupon->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center" >
                                                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                                    <h4 class="h4 mb-0 mt-3" style="color: red">Warning</h4>
                                                    <p class="card-text">Are you sure you want to delete data?</p>
                                                    <strong class="card-text" style="color: red">Once deleted, you will not be able to recover this data!</strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('coupon.destroy', $coupon->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        @endpush
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-dark">No Record</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pagination-area mt-15 mb-50">
        {{ $coupons->links('vendor.pagination.custom_pagination') }}
    </div>

@endsection
