@php
    $orders = [
        (object)[
            'id' => 1,
            'car' => (object)[
                'name' => 'Toyota Avanza',
                'brand' => 'Toyota',
                'year' => 2020,
                'transmission' => 'manual',
                'fuel_type' => 'Bensin',
                'image' => 'cars/avanza.jpg',
            ],
            'user' => (object)[
                'name' => 'Agnes Ketaren',
                'email' => 'agnes@example.com',
            ],
            'phone' => '08123456789',
            'id_number' => '1234567890',
            'start_date' => '2025-06-20',
            'end_date' => '2025-06-23',
            'duration' => 3,
            'total_price' => 1050000,
            'notes' => 'Tolong mobil siap sebelum jam 9 pagi',
            'created_at' => \Carbon\Carbon::now()->subDays(2),
        ],
        (object)[
            'id' => 2,
            'car' => (object)[
                'name' => 'Honda Jazz',
                'brand' => 'Honda',
                'year' => 2019,
                'transmission' => 'automatic',
                'fuel_type' => 'Bensin',
                'image' => null,
            ],
            'user' => (object)[
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
            ],
            'phone' => null,
            'id_number' => null,
            'start_date' => '2025-06-25',
            'end_date' => '2025-06-27',
            'duration' => 2,
            'total_price' => 700000,
            'notes' => null,
            'created_at' => \Carbon\Carbon::now()->subDays(1),
        ],
    ];
@endphp

@extends('layouts.owner')

@section('title', 'Pesanan Masuk')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Pesanan Masuk</h1>
            <p class="mt-2 text-gray-600">Kelola pesanan yang masuk untuk mobil Anda</p>
        </div>

        @if(count($orders) > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">
                                Pesanan #{{ $order->id }} - {{ $order->car->name }}
                            </h3>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Menunggu Konfirmasi
                            </span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Dipesan pada {{ $order->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                    
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Informasi Penyewa</h4>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">Nama:</span>
                                        <span class="text-sm text-gray-900">{{ $order->user->name }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">Email:</span>
                                        <span class="text-sm text-gray-900">{{ $order->user->email }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">No. HP:</span>
                                        <span class="text-sm text-gray-900">{{ $order->phone ?? '-' }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">No. KTP:</span>
                                        <span class="text-sm text-gray-900">{{ $order->id_number ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Detail Pemesanan</h4>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Tanggal Mulai:</span>
                                        <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Tanggal Selesai:</span>
                                        <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Durasi:</span>
                                        <span class="text-sm text-gray-900">{{ $order->duration }} hari</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Total Biaya:</span>
                                        <span class="text-sm font-semibold text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($order->notes)
                        <div class="mt-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Catatan Tambahan</h4>
                            <p class="text-sm text-gray-600 bg-gray-50 p-3 rounded">{{ $order->notes }}</p>
                        </div>
                        @endif
                        
                        <div class="mt-4 p-4 bg-gray-50 rounded-lg flex items-center space-x-4">
                            @if($order->car->image)
                                <img src="{{ asset('storage/' . $order->car->image) }}" alt="{{ $order->car->name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <h5 class="text-sm font-medium text-gray-900">{{ $order->car->name }}</h5>
                                <p class="text-sm text-gray-500">{{ $order->car->brand }} • {{ $order->car->year }}</p>
                                <p class="text-sm text-gray-500">{{ ucfirst($order->car->transmission) }} • {{ $order->car->fuel_type }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- form konfirmasi --}}
                    <form method="POST" action="" class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col space-y-4">
                        @csrf
                        @method('PUT')

                        {{-- tombol konfirmasi --}}
                        <button type="submit" name="action" value="accept" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-200">
                            Konfirmasi
                        </button>

                        {{-- form penolakan --}}
                        <div>
                            <label for="rejection_reason_{{ $order->id }}" class="block text-sm font-medium text-gray-700 mb-1">Alasan Penolakan</label>
                            <textarea
                                id="rejection_reason_{{ $order->id }}"
                                name="rejection_reason"
                                rows="3"
                                placeholder="Tulis alasan penolakan..."
                                class="w-full border border-gray-300 rounded-md px-3 py-2 resize-none focus:outline-none focus:ring-1 focus:ring-red-500"
                            ></textarea>
                            <button type="submit" name="action" value="reject" class="mt-2 px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-50 transition duration-200">
                                Tolak Pesanan
                            </button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white shadow rounded-lg">
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pesanan masuk</h3>
                    <p class="mt-1 text-sm text-gray-500">Saat ini tidak ada pesanan yang menunggu konfirmasi.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
