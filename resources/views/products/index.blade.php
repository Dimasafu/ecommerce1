@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-center text-green-700 mb-10">Produk Kami</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-xl shadow hover:shadow-lg p-4 transition">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">
                <h2 class="text-lg font-semibold text-green-700">{{ $product->name }}</h2>
                <p class="text-sm text-gray-600">{{ Str::limit($product->description, 80) }}</p>
                <p class="text-green-800 font-bold mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
        @empty
            <p class="col-span-4 text-center text-gray-500">Belum ada produk tersedia.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
