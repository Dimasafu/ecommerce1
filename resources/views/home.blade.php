@extends('layouts.app')

@section('content')

<!-- Hero Banner -->
<div class="container-fluid bg-light py-5 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold text-success">Kirim Bunga, Sebarkan Cinta 💐</h1>
        <p class="lead">Florist Online, pengiriman cepat dan bunga berkualitas premium</p>
        <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">Lihat Koleksi</a>
    </div>
</div>

<!-- Fitur -->
<div class="container text-center py-5">
    <div class="row">
        <div class="col-md-4">
            <img src="/images/delivery.png" alt="Delivery" width="80">
            <h5 class="mt-3 text-success">Pengiriman Cepat</h5>
            <p>Kami antar di hari yang sama ke seluruh kota besar.</p>
        </div>
        <div class="col-md-4">
            <img src="/images/fresh.png" alt="Fresh" width="80">
            <h5 class="mt-3 text-success">Bunga Segar</h5>
            <p>Bunga langsung dari petani, segar dan tahan lama.</p>
        </div>
        <div class="col-md-4">
            <img src="/images/support.png" alt="Support" width="80">
            <h5 class="mt-3 text-success">Dukungan 24/7</h5>
            <p>Tim kami siap membantu via WhatsApp setiap saat.</p>
        </div>
    </div>
</div>

<!-- Produk Rekomendasi -->
<div class="container py-5">
    <h2 class="text-center text-success mb-4">Rekomendasi Buket</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="80">
                <div class="card-body">
                    <h5 class="card-title text-success">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 60) }}</p>
                    <p class="fw-bold text-success">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="#" class="btn btn-outline-success btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
