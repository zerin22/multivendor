@extends('layouts.backend.backend_master')
@section('title', 'Order List')
@section('coupon.add', 'active')

@section('content')
    {{-- <a href="" class="mb-3 btn btn-dark">Add Vendor</a> --}}
    <div class="row">
        <div class="col-12">
            <table class="table">
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
                    @forelse ($order_summeries as $order_summery)
                        <tr>
                            <th scope="row">{{ $order_summery->id }}</th>
                            <td>{{ $order_summery->grand_total }}</td>
                            <td>{{ $order_summery->payment_option == 0 ? 'COD' : 'Online' }}</td>
                            <td>{{ $order_summery->payment_status == 0 ? 'Not Paid' : 'Paid' }}</td>
                            <td>
                                @if ($order_summery->delivered_status == 0)
                                    Pending
                                @else
                                    Delivered
                                @endif
                            </td>
                            <td>
                                @if ($order_summery->payment_status == 1 && $order_summery->delivered_status == 0)
                                    <a id="receivedpayment" href="{{ route('mark.received', $order_summery->id) }}"
                                        class="btn btn-info">Mark Received</a>
                                @endif
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
