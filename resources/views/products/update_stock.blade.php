@extends('layouts.app')

@section('content')
    <h1>Update Stock</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Product</a>
    <a href="{{ route('products.available') }}" class="btn btn-success mb-3">Available Stock</a>
    <a href="{{ route('products.unavailable') }}" class="btn btn-danger mb-3">Unavailable Stock</a> 
    <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="stock">Jumlah Stok Baru</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>
@endsection
