@extends('layouts.backend.backend_master')
@section('title', 'Order List')
@section('vendorOrder', 'active')

@section('content')
    <div class="content-header">
        <h2 class="content-title">Order List</h2>
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
                            <th scope="col">Order ID</th>
                            <th scope="col">Grand Total</th>
                            <th scope="col">Payment Option</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Received Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($all_orders as $all_order)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{  $all_order->relationWithOrderSummery->grand_total }}</td>
                                <td>{{ $all_order->relationWithOrderSummery->payment_option == 0 ? 'COD' : 'Online' }}</td>
                                <td>{{ $all_order->relationWithOrderSummery->payment_status == 0 ? 'Not Paid' : 'Paid' }}</td>
                                <td>
                                    @if ( $all_order->relationWithOrderSummery->delivered_status == 0)
                                        <span class="badge rounded-pill alert-warning">Pending</span>
                                    @elseif ($all_order->relationWithOrderSummery->delivered_status == 2)
                                        <span class="badge rounded-pill alert-success">Delivered</span>
                                    @elseif ($all_order->relationWithOrderSummery->delivered_status == 1)
                                        <span class="badge rounded-pill alert-info">Accepted</span>
                                    @elseif ($all_order->relationWithOrderSummery->delivered_status == 3)
                                        <span class="badge rounded-pill alert-danger">Cancle</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            {{-- <a class="dropdown-item" href="">Detail</a> --}}
                                            <a class="dropdown-item" href="{{ route('singleVendorOrder.show', $all_order->order_summery_id) }}">Detail</a>
                                            {{-- <a class="dropdown-item" href="{{ route('invoice.download') }}">PDF Download</a>
                                            <a class="dropdown-item" href="{{ route('invoice.download.excel') }}">Excel Download</a> --}}
                                        </div>
                                    </div>
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
    {{-- <div class="pagination-area mt-15 mb-50">
        {{ $order_summeries->links('vendor.pagination.custom_pagination') }}
    </div> --}}
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
