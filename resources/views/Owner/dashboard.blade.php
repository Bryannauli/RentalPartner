@php
    $cars = collect([
        (object)[
            'id' => 1,
            'name' => 'Toyota Avanza',
            'brand' => 'Toyota',
            'year' => 2022,
            'description' => 'Mobil keluarga irit dan nyaman.',
            'price_per_day' => 350000,
            'status' => 'available',
            'transmission' => 'manual',
            'fuel_type' => 'bensin',
            'image' => null
        ],
        (object)[
            'id' => 2,
            'name' => 'Honda Brio',
            'brand' => 'Honda',
            'year' => 2021,
            'description' => 'Mobil city car cocok buat harian.',
            'price_per_day' => 300000,
            'status' => 'rented',
            'transmission' => 'automatic',
            'fuel_type' => 'bensin',
            'image' => null
        ]
    ]);
@endphp

@extends('layouts.owner')

@section('title', 'Dashboard Pemilik Mobil')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Mobil yang Anda Sewakan</h1>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cars as $car)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $car->name }}</h2>
                        <p class="text-gray-600">{{ $car->brand }} - {{ $car->year }}</p>
                        <p class="text-gray-800 font-bold mt-2">Rp {{ number_format($car->price_per_day, 0, ',', '.') }} / hari</p>
                        <p class="text-sm text-gray-600 mt-1">Transmisi: {{ ucfirst($car->transmission) }}</p>
                        <p class="text-sm text-gray-600">BBM: {{ $car->fuel_type }}</p>
                        <p class="text-sm mt-2 text-gray-500 italic">{{ $car->description }}</p>

                        <div class="flex justify-between mt-4">
                            {{-- <form action="{{ route('owner.cars.edit', $car->id) }}" method="GET">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded text-sm">
                                    Update
                                </button>
                            </form> --}}
                            {{-- <form action="{{ route('owner.cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mobil ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded text-sm">
                                    Hapus
                                </button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="mt-10">
            <a href="{{ route('owner.cars.create') }}" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                Tambah Mobil Baru
            </a>
        </div> --}}
    </div>
</div>
@endsection
