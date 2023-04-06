@extends('layouts.backend.backend_master')
@section('title', 'User List')
@section('user','active')
@section('content')
    {{-- <a href="{{ route('banner.create') }}" class="mb-3 btn btn-dark">Add Banner</a> --}}
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <img src="{{ asset('uploads/profile_photos') }}/{{ $customer->profile_photo }}" alt=""
                                    width="100">
                            </td>
                            {{-- <td>
                                <a href="#" class="btn btn-success">Edit</a>
                                <form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @empty
                        <div class="alert alert-dark">No Record</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

