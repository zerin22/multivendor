@extends('layouts.backend.backend_master')
@section('title', 'Email Send')
@section('email-offer','active')
@section('content')

@section('content')
    <div class="content-header">
        <h2 class="content-title">Customer</h2>
        <form action="{{ route('multi_email_offer') }}" method="POST">
            @csrf
            <div>
                <a href="{{ route('vendor.create') }}" class="btn btn-primary"><i class="material-icons md-plus"></i>Send All</a>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Customers</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            @if (Auth::user()->role == 2)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Check</th>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <input type="checkbox" name="check[]" class="form-check-input"
                                        value="{{ $customer->id }}">
                                </td>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <a href="{{ route('single_email_offer', $customer->id) }}"
                                        class="btn btn-md rounded font-sm">SEND</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="alert alert-warning"> You Are Not Allowed</div>
            @endif
        </div>
    </div>
@endsection
