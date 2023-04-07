@extends('layouts.backend.backend_master')
@section('title', 'Vendor Index')
@section('vendor', 'active')
@section('vendor.index', 'active')

@section('content')
    <div class="content-header">
        <h2 class="content-title">Sellers list</h2>
        <div>
            <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
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
                                        {{-- <small class="text-muted">Seller ID: #439</small> --}}
                                    </div>
                                </a>
                            </td>
                            <td>{{ $vendor->relationWithUser->email }}</td>
                            <td><span class="badge rounded-pill alert-success">Active</span></td>
                            <td>{{ \Carbon\Carbon::parse($vendor->relationWithUser->created_at)->format('m F Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('vendor.show', $vendor->id) }}" class="btn btn-sm btn-brand rounded font-sm mt-15" >View details</a>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-dark">No Record</div>
                    @endforelse
                    </tbody>
                </table>
                <!-- table-responsive.// -->
            </div>
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
    <div class="pagination-area mt-15 mb-50">

        {{-- {{ $vendors->links() }} --}}
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

    //     $(document).ready(function() {
    //     $('.select__row').change(function() {
    //     var data_value = $(this).val()
    //     // alert(data_value)

    //     $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             type: "POST",
    //             url: '{{ route('vendor.list') }}',
    //             data: {
    //                 data_value : data_value,
    //             },
    //             success: function(data){
    //                 console.log(data);
    //                 $('#blog_data').append(data.data);
    //             }
    //         });
    //     })
    // });

    </script>
@endsection
