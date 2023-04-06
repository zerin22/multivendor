@extends('layouts.backend.backend_master')
@section('title', 'Size')
@section('size', 'active')

@section('content')
    <a href="{{ route('size.create') }}" class="mb-3 btn btn-dark">Add Size</a>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Sizes</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sizes as $size)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ App\Models\Product::find($size->product_id)->product_name }}</td>
                            <td>{{ $size->size }}</td>
                            <td>{{ $size->quantity }}</td>
                            <td>
                                <form action="{{ route('size.destroy', $size->id) }}" method="post">
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

@section('footer_script')
    @if (Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}")
        </script>
    @endif
    @if (Session::has('delete'))
        <script>
            toastr.error("{!! Session::get('delete') !!}")
        </script>
    @endif
@endsection
