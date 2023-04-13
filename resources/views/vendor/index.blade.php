@extends('layouts.backend.backend_master')
@section('title', 'Vendor Index')
@section('vendor', 'active')
@section('vendor.index', 'active')

@section('content')
    <div class="content-header">
        <h2 class="content-title">Vendors List</h2>
        <div>
            <a href="{{ route('vendor.create') }}" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text"  placeholder="Search..." class="form-control table_search" />
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option >Select</option>
                        <option value='2'>Show 20</option>
                        <option value='30'>Show 30</option>
                        <option value='40'>Show 40</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Seller</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vendors as $vendor)
                        <tr>
                            <td width="40%">
                                <a href="#" class="itemside">
                                    <div class="left">
                                        <img src="{{ asset('uploads/profile_photos') }}/{{ $vendor->relationWithUser->profile_photo }}" class="img-sm img-avatar" alt="Userpic" />
                                    </div>
                                    <div class="info pl-3">
                                        <h6 class="mb-0 title">{{ $vendor->relationWithUser->name }}</h6>
                                    </div>
                                </a>
                            </td>
                            <td>{{ $vendor->relationWithUser->email }}</td>
                            <td>
                                @if ( $vendor->status == 'active')
                                    <span class="badge rounded-pill alert-success">Active</span>
                                @else
                                    <span class="badge rounded-pill alert-danger">InActive</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($vendor->relationWithUser->created_at)->format('m F Y') }}</td>
                            <td class="text-end">
                                @if ( $vendor->status == 'active')
                                    <a href="{{ route('vendor.inactive', $vendor->id) }}" class="btn btn-light rounded font-sm inative__btn">InActive</a>
                                @else
                                    <a href="{{ route('vendor.active', $vendor->id) }}" class="btn btn-md rounded font-sm" >Active</a>
                                @endif
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('vendor.show', $vendor->id) }}" >View detail</a>
                                        <a class="dropdown-item" href="{{ route('vendor.edit', $vendor->id) }}">Edit info</a>
                                        <a class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal__{{ $vendor->id }}">Delete</a>
                                    </div>
                                </div>
                            </td>

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
        {{ $vendors->links('vendor.pagination.custom_pagination') }}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Table Search
            $('.table_search').on('input', function(){
                var tableSearchValue = $(this).val();
                $(this).closest(".card").find(".table tbody tr").each(function(){
                    if($(this).text().search(new RegExp(tableSearchValue, "i")) < 0){
                        $(this).hide();
                    }
                    else{
                        $(this).show();
                    }
                });
            });
        });
    </script>
@endsection
