<!-- resources/views/products/index.blade.php -->

@extends('layout')

@section('content')
    <h1>Product List</h1>

    <form method="GET" action="{{ route('products.index') }}" class="search-form">
        <input type="text" name="search" placeholder="Search by product ID or description" class="form-control">
        <button type="submit" class="btn btn-submit">Search</button>
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-create">Create New Product</a>

    <table>
        <thead>
            <tr><th>Product ID</th>
                <th>
                    <a href="{{ route('products.index', ['sort' => 'name', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="sort-link">
                        Name
                        @if (request('sort') == 'name')
                            <i>{{ request('order') == 'asc' ? '↑' : '↓' }}</i>
                        @else
                            <i>↑</i> <!-- Show up arrow by default if not sorted -->
                        @endif
                    </a>
                </th>
                <th>Description</th>
                
                <th>Stock</th>
                <th>
                    <a href="{{ route('products.index', ['sort' => 'price', 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}" class="sort-link">
                        Price
                        @if (request('sort') == 'price')
                            <i>{{ request('order') == 'asc' ? '↑' : '↓' }}</i>
                        @else
                            <i>↑</i> <!-- Show up arrow by default if not sorted -->
                        @endif
                    </a>
                </th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: auto;">
                        @endif
                    </td>
                    
                    <td>
                       
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->appends(request()->query())->links() }}
@endsection
