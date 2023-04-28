@extends('layouts.backend.backend_master')
@section('title', 'Product List')
@section('product', 'active')
@section('product.index', 'active')

@section('content')
    <a href="{{ route('product.create') }}" class="mb-3 btn btn-dark">Add Product</a>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Discount</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Category:</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td>${{ $product->product_price }}</td>
                            <td>
                                @if ($product->product_discount == null)
                                    NULL
                                @else
                                    {{ $product->product_discount }}%
                                @endif
                            </td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                            <td class="d-flex">
                                <a class="btn btn-outline-info" href="{{ route('product.edit', $product->id) }}">Edit</a>
                                <a class="btn btn-outline-warning mx-2"
                                    href="{{ route('product.show', $product->id) }}">Show</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Delete</button>
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
