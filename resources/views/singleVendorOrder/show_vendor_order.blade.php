@extends('layouts.backend.backend_master')
@section('title', 'Order List')
@section('vendorOrder', 'active')

@section('content')

<div class="content-header">
    <div>
        <h2 class="content-title card-title">Order detail</h2>
        <p>Details for Order ID: {{ $order->id }}</p>


    </div>
</div>
<div class="card">
    <header class="card-header">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                <span> <i class="material-icons md-calendar_today"></i> <b>{{ \Carbon\Carbon::parse($order->created_at, 'Y-m-d H:i:s')->diffForHumans() }}</b> </span> <br />
                <small class="text-muted">Order ID: {{ $order->id }}</small>
            </div>
            <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                <input class="status-id" type="hidden" value="{{ $order->id }}">
                <select class="form-select d-inline-block mb-lg-0 mr-5 mw-200 status-change" >
                    <option value="0" {{ $order->delivered_status == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $order->delivered_status == 1 ? 'selected' : '' }}>Accepted</option>
                    <option value="3" {{ $order->delivered_status == 3 ? 'selected' : '' }}>Cancelled</option>
                    <option value="2" {{ $order->delivered_status == 2 ? 'selected' : '' }}>Delivered</option>
                </select>
                {{-- <a class="btn btn-primary" href="{{  }}">Save</a> --}}
            </div>
        </div>
    </header>
    <!-- card-header end// -->
    <div class="card-body">
        <div class="row mb-50 mt-20 order-info-wrap">
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-person"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Customer</h6>
                        <p class="mb-1">
                            {{ $billing_detail->name }}<br />
                            {{ $billing_detail->email }} <br />
                            {{ $billing_detail->phone }}
                        </p>
                    </div>
                </article>
            </div>
            <!-- col// -->
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-local_shipping"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Order info</h6>
                        <p class="mb-1">
                            {{-- Shipping: Fargo express <br /> --}}
                            Pay method:
                            @if ($order->payment_option == 0)
                                Cash On Delivery
                            @else
                                Online Payment
                            @endif
                            <br />
                            Status:
                            @if ($order->delivered_status == 0)
                                Not Delivered
                            @else
                               Delivered
                            @endif
                        </p>
                    </div>
                </article>
            </div>
            <!-- col// -->
            <div class="col-md-4">
                <article class="icontext align-items-start">
                    <span class="icon icon-sm rounded-circle bg-primary-light">
                        <i class="text-primary material-icons md-place"></i>
                    </span>
                    <div class="text">
                        <h6 class="mb-1">Deliver to</h6>
                        <p class="mb-1">
                            State: {{ $billing_detail->relationWithState->name }},
                            City: {{ $billing_detail->relationWithCity->name }}, {{ $billing_detail->relationWithCountry->name }} <br />
                            {{ $billing_detail->address }} <br />
                            {{ $billing_detail->postcode }}
                        </p>
                    </div>
                </article>
            </div>
            <!-- col// -->
        </div>
        <!-- row // -->
        <div class="row">
            <div class="col-lg-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40%">Product</th>
                                <th width="20%">Unit Price</th>
                                <th width="20%">Quantity</th>
                                <th width="20%" class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order_details as $order_detail)
                            <tr>
                                <td>
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="{{ asset('uploads/product_photos/') }}/{{ $order_detail->relationwithproduct->product_photo }}" width="40" height="40" class="img-xs" alt="Item" />
                                        </div>
                                        <div class="info">{{ $order_detail->relationwithproduct->product_name }}</div>
                                    </a>
                                </td>
                                <td>${{ $order_detail->relationwithproduct->product_price }}</td>
                                <td>{{ $order_detail->amount }}</td>
                                <td class="text-end">${{ $order_detail->relationwithproduct->product_price * $order_detail->amount}} </td>
                            </tr>
                            @empty

                            @endforelse

                            <tr>
                                <td colspan="4">
                                    <article class="float-end">
                                        <dl class="dlist">
                                            <dt>Cart total:</dt>
                                            <dd>${{ $order->cart_total }}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Subtotal:</dt>
                                            <dd>${{ $order->sub_total }}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Shipping cost:</dt>
                                            <dd>${{ $order->shipping_total }}</dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt>Grand total:</dt>
                                            <dd><b class="h5">${{ $order->grand_total }}</b></dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt class="text-muted">Payment Option:</dt>
                                            <dd>
                                                <span class="badge rounded-pill alert-success text-success">{{ $order->payment_option == 0 ? 'Cash On Delivery' : 'Online' }}</span>
                                            </dd>
                                        </dl>
                                        <dl class="dlist">
                                            <dt class="text-muted">Payment Status:</dt>
                                            <dd>
                                                @if ( $order->payment_status == 0)
                                                    <span class="badge rounded-pill alert-danger">Not Paid</span>
                                                @else
                                                    <span class="badge rounded-pill alert-success">Paid</span>
                                                @endif
                                            </dd>
                                        </dl>
                                    </article>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- col// -->
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <div class="box shadow-sm bg-light">
                    <h6 class="mb-15">Payment info(Still Static)</h6>
                    <p>
                        <img src="assets/imgs/card-brands/2.png" class="border" height="20" /> Master Card **** **** 4768 <br />
                        Business name: Grand Market LLC <br />
                        Phone: +1 (800) 555-154-52
                    </p>
                </div>

               <div class="h-25 pt-4">
                    <div class="mb-3">
                        <div class="box shadow-sm bg-light">
                            <h6 class="mb-15">Order Note</h6>
                            <p>
                                {{ $billing_detail->order_notes }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="h-25 pt-4">
                    <div class="mb-3">
                        <label>Note</label>
                        <textarea class="form-control" name="notes" id="notes" placeholder="Type some note">{{ $billing_detail->order_notes }}</textarea>
                    </div>
                    <button  class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.status-change').change(function() {
        var status = $(this).val();
        var status_id = $('.status-id').val();
        console.log(status);

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route('vendor.status.change') }}',
                data: {
                status : status,
                status_id : status_id
                },
                success: function(data){
                    toastr.success('Status Update')
                }
            });
        })
    });
    </script>
@endsection
