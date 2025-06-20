@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Tambah Produk</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
    <label for="category_id">Kategori</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Gambar Produk</label>
    <input type="file" class="form-control" name="image" required>
</div>

        <div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? 0) }}" required>
    </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
