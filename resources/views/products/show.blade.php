<!-- resources/views/products/show.blade.php -->

@extends('layout')

@section('content')
    <h1>Product Details</h1>

    <div class="product-details">
        <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
        <p><strong>Name:</strong> {{ $product->name }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        @if($product->image)
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 200px; margin-top: 10px;">
        @endif
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-back">Back to Product List</a>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Edit Product</a>
@endsection
