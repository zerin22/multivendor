@extends('layouts.backend.backend_master')
@section('title', 'Messsage List')
@section('contact', 'active')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{!! Str::limit($message->message, 20, '...') !!}</td>
                            <td>
                                <a href="{{ route('contact.show', $message->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('contact.edit', $message->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('contact.destroy', $message->id) }}" method="post">
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
