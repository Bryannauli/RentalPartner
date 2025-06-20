
@extends('owner.layout')

@section('title', 'Dashboard Pemilik Mobil')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Mobil yang Anda Sewakan</h1>

    <div class="mb-8">
            <a href="{{route('owner.posts')}}" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                Tambah Mobil Baru
            </a>
        </div> 

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->car_name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $post->car_name }}</h2>
                        <p class="text-gray-600">{{ $post->brand }} - {{ $post->year }}</p>
                        <p class="text-gray-800 font-bold mt-2">Rp {{ number_format($post->price, 0, ',', '.') }} / hari</p>
                        <p class="text-sm text-gray-600 mt-1">Tipe: {{ $post->type }}</p>
                        <p class="text-sm text-gray-600 mt-1">Transmisi: {{ ucfirst($post->transmission) }}</p>
                        <p class="text-sm text-gray-600">Jarak tempuh: {{ $post->mileage }}</p>
                        <p class="text-sm text-gray-600">Kapasitas: {{ $post->capacity }}</p>
                        <p class="text-sm text-gray-600">Bagasi: {{ $post->baggage }}</p>
                        <p class="text-sm text-gray-600">Fasilitas: {{ $post->facilities }}</p>
                        <p class="text-sm text-gray-600">Lokasi: {{ $post->location }}</p>
                        <p class="text-sm mt-2 text-gray-500 italic">{{ $post->description }}</p>

                        <div class="flex justify-between mt-4">
                            <form action="{{route('owner.posts.edit', $post->id)}}" method="GET">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded text-sm">
                                    Edit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
