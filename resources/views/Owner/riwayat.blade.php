@php
    $bookings = collect([
        (object)[
            'id' => 1,
            'status' => 'confirmed',
            'created_at' => \Carbon\Carbon::now()->subDays(3),
            'total_price' => 500000,
            'user' => (object)[
                'name' => 'Agnes Ketaren',
                'email' => 'agnes@example.com',
            ],
            'phone' => '081234567890',
            'car' => (object)[
                'name' => 'Toyota Avanza',
                'brand' => 'Toyota',
                'year' => 2022,
                'image' => null,
            ],
            'start_date' => now()->subDays(10),
            'end_date' => now()->subDays(7),
            'duration' => 3,
            'notes' => 'Harap mobil diantar jam 9 pagi',
            'rejection_reason' => null,
        ],
        (object)[
            'id' => 2,
            'status' => 'rejected',
            'created_at' => \Carbon\Carbon::now()->subDays(1),
            'total_price' => 350000,
            'user' => (object)[
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
            ],
            'phone' => null,
            'car' => (object)[
                'name' => 'Honda Jazz',
                'brand' => 'Honda',
                'year' => 2021,
                'image' => 'cars/honda-jazz.jpg',
            ],
            'start_date' => now()->subDays(5),
            'end_date' => now()->subDays(3),
            'duration' => 2,
            'notes' => null,
            'rejection_reason' => 'Dokumen tidak lengkap',
        ],
    ]);
@endphp

@php
    $cars = collect([
        (object)[ 'id' => 1, 'name' => 'Toyota Avanza' ],
        (object)[ 'id' => 2, 'name' => 'Honda Jazz' ],
        (object)[ 'id' => 3, 'name' => 'Daihatsu Xenia' ],
    ]);
@endphp


@extends('owner.layout')

@section('title', 'Histori Penyewaan')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Histori Penyewaan</h1>
            <p class="mt-2 text-gray-600">Riwayat pemesanan mobil Anda</p>
        </div>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('history') }}" class="mb-6 bg-white p-4 rounded-lg shadow">
            <div class="flex flex-wrap gap-4 items-end">
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Dikonfirmasi</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>
                <div>
                    <label for="car" class="block text-sm font-medium text-gray-700 mb-1">Mobil</label>
                    <select name="car" id="car" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="" {{ request('car') == '' ? 'selected' : '' }}>Semua Mobil</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}" {{ request('car') == $car->id ? 'selected' : '' }}>
                                {{ $car->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Filter</button>
                </div>
                <div>
                    <a href="{{ route('history') }}" class="px-4 py-2 text-gray-600 hover:text-gray-800 text-sm">
                        Reset Filter
                    </a>
                </div>
            </div>
        </form>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Total Pesanan</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $bookings->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Dikonfirmasi</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $bookings->where('status', 'confirmed')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Ditolak</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $bookings->where('status', 'rejected')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-500">Total Pendapatan</p>
                        <p class="text-lg font-semibold text-gray-900">Rp {{ number_format($bookings->where('status', 'confirmed')->sum('total_price'), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($bookings->count() > 0)
            <div class="space-y-4">
                @foreach($bookings as $booking)
                <div class="booking-item bg-white shadow rounded-lg">
                    <div class="px-6 py-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Pesanan #{{ $booking->id }}
                                </h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    @if($booking->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($booking->status === 'confirmed') bg-green-100 text-green-800
                                    @elseif($booking->status === 'rejected') bg-red-100 text-red-800
                                    @elseif($booking->status === 'completed') bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    @if($booking->status === 'pending') Menunggu
                                    @elseif($booking->status === 'confirmed') Dikonfirmasi
                                    @elseif($booking->status === 'rejected') Ditolak
                                    @elseif($booking->status === 'completed') Selesai
                                    @else {{ ucfirst($booking->status) }} @endif
                                </span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">{{ $booking->created_at->format('d M Y') }}</p>
                                <p class="text-lg font-semibold text-gray-900">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Penyewa</h4>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-600">{{ $booking->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking->user->email }}</p>
                                    @if($booking->phone)
                                        <p class="text-sm text-gray-500">{{ $booking->phone }}</p>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Mobil</h4>
                                <div class="flex items-center space-x-3">
                                    @if($booking->car->image)
                                        <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}" class="w-12 h-12 object-cover rounded">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $booking->car->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $booking->car->brand }} {{ $booking->car->year }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Detail Sewa</h4>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking->duration }} hari</p>
                                    @if($booking->status === 'rejected' && $booking->rejection_reason)
                                        <p class="text-sm text-red-600 mt-2">
                                            <span class="font-medium">Alasan ditolak:</span> {{ $booking->rejection_reason }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($booking->notes)
                        <div class="mt-4 p-3 bg-gray-50 rounded">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Catatan:</span> {{ $booking->notes }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
                {{-- pagination --}}
                @if(method_exists($bookings, 'links'))
                <div class="mt-6">
                    {{ $bookings->withQueryString()->links() }}
                </div>
                @endif
            </div>
        @else
            <div class="bg-white shadow rounded-lg">
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada histori</h3>
                    <p class="mt-1 text-sm text-gray-500">Histori pemesanan akan muncul di sini.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
