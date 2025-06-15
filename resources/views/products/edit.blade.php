@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Ganti Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? 0) }}" required>
    </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
