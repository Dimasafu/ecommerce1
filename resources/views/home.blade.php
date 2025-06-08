@extends('layouts.app')

@section('content')
    <div class="relative bg-white text-center">
        <div class="container mx-auto px-4 py-20">
            <h1 class="text-5xl font-bold text-green-700 mb-4 animate-fade-in-down">Welcome to Florist Online</h1>
            <p class="text-lg text-gray-600 mb-6 animate-fade-in">Beautiful flowers delivered to your door</p>
            <a href="{{ route('products.index') }}" class="bg-green-600 text-black px-6 py-3 rounded-lg shadow hover:bg-green-700 transition">
                Belanja Sekarang
            </a>
        </div>
    </div>
@endsection
