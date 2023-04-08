@extends('layouts.backend.backend_master')
@section('title', 'Vendor Show')
@section('vendor', 'active')
@section('vendor.create', 'active')

@section('content')
    <div class="content-header">
        <a href="{{ route('vendor.index') }}"><i class="material-icons md-arrow_back"></i> Go back </a>
    </div>
    <div class="card mb-4">
        <div class="card-header bg-brand-2" style="height: 150px"></div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis: 230px">
                    <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height: 190px; width: 200px; margin-top: -120px">
                        <img src="{{ asset('uploads/profile_photos') }}/{{ $vendor->relationWithUser->profile_photo }}" class="center-xy img-fluid" alt="Logo Brand" />
                    </div>
                </div>
                <div class="col-xl col-lg">
                    <h3>{{ $vendor->relationWithUser->name }}</h3>
                    <p>{{ $vendor->vendor_address }}</p>
                    @if ( $vendor->status == 'active')
                        <span class="badge rounded-pill alert-success">Active</span>
                    @else
                        <span class="badge rounded-pill alert-danger">InActive</span>
                    @endif
                </div>
                <div class="col-xl-4 text-md-end">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> Actions </a>
                        <div class="dropdown-menu">
                        @if ( $vendor->status == 'active')
                            <a class="dropdown-item" href="{{ route('vendor.inactive', $vendor->id) }}">Inactive</a>
                        @else
                            <a class="dropdown-item" href="{{ route('vendor.active', $vendor->id) }}">Active</a>
                        @endif
                            <a class="dropdown-item" href="{{ route('vendor.edit', $vendor->id) }}">Edit info</a>
                            <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal__{{ $vendor->id }}">Delete</a>

                            @push('modal')
                            <div class="modal fade" id="exampleModal__{{ $vendor->id }}" tabindex="-1" aria-labelledby="exampleModal__{{ $vendor->id }}" aria-hidden="true">
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
                                        <form action="{{ route('vendor.destroy', $vendor->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endpush
                        </div>
                    </div>
                    {{-- <a href="#" class="btn btn-primary"> View live <i class="material-icons md-launch"></i> </a> --}}
                </div>
                <!--  col.// -->
            </div>
            <!-- card-body.// -->
            <hr class="my-4" />
            <div class="row g-4">
                <div class="col-md-12 col-lg-4 col-xl-2">
                    <article class="box">
                        <p class="mb-0 text-muted">Total sales:</p>
                        <h5 class="text-success">238</h5>
                        <p class="mb-0 text-muted">Revenue:</p>
                        <h5 class="text-success mb-0">$2380</h5>
                    </article>
                </div>
                <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Contacts</h6>
                    <p>
                        Manager: # <br />
                        {{ $vendor->relationWithUser->email }}<br />
                        {{ $vendor->relationWithUser->phone }}
                    </p>
                </div>
                <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <h6>Address</h6>
                    <p>
                        Country: California <br />
                        Address: {{ $vendor->vendor_address }} <br />
                        Postal code: 62639
                    </p>
                </div>
                <!--  col.// -->
                {{-- <div class="col-sm-6 col-xl-4 text-xl-end">
                    <map class="mapbox position-relative d-inline-block">
                        <img src="assets/imgs/misc/map.jpg" class="rounded2" height="120" alt="map" />
                        <span class="map-pin" style="top: 50px; left: 100px"></span>
                        <button class="btn btn-sm btn-brand position-absolute bottom-0 end-0 mb-15 mr-15 font-xs">Large</button>
                    </map>
                </div> --}}
                <!--  col.// -->
            </div>
            <!--  row.// -->
        </div>
        <!--  card-body.// -->
    </div>
    <!--  card.// -->
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">Products by seller</h3>
            <div class="row">
            @forelse ($products as $product)
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap"> <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="Product" /> </a>
                        <div class="info-wrap">
                            <a href="#" class="title">{{ $product->product_name }}</a>
                            <div class="price mt-1">${{ $product->product_price }}</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-dark">No Record</div>
            @endforelse
            </div>
        </div>
    </div>
    <!--  card.// -->
    <div class="pagination-area mt-30 mb-50">
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                </li>
            </ul>
        </nav> --}}
        {{ $products->links('vendor.pagination.custom_pagination') }}
    </div>
@endsection
