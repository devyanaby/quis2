@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a href="{{ route('products.create') }}" class="nav-link btn">Tambah Product</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('products.available') }}" class="nav-link btn">Available Stock</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('products.unavailable') }}" class="nav-link btn">Unavailable Stock</a>
                </li>
            </ul>
        </nav>

        <h1>Daftar Produk</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                    <tr class="{{ $index % 2 == 0 ? 'table-primary' : 'table-secondary' }}">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('products.updateStockForm', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Perbarui Stok</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapusnya?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
