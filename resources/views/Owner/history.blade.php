@extends('layouts.app')

@section('title', 'Histori Penyewaan')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Histori Penyewaan</h1>
            <p class="mt-2 text-gray-600">Riwayat pemesanan mobil Anda</p>
        </div>

        <!-- Navigation -->
        <div class="mb-6">
            <nav class="flex space-x-8">
                <a href="{{ route('owner.dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm">
                    Dashboard
                </a>
                <a href="{{ route('owner.orders') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm">
                    Pesanan Masuk
                </a>
                <a href="{{ route('owner.history') }}" class="border-b-2 border-blue-500 text-blue-600 px-3 py-2 font-medium text-sm">
                    Histori
                </a>
            </nav>
        </div>

        <!-- Filter -->
        <div class="mb-6">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex flex-wrap gap-4 items-center">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="statusFilter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">Semua Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="confirmed">Dikonfirmasi</option>
                            <option value="rejected">Ditolak</option>
                            <option value="completed">Selesai</option>
                            <option value="cancelled">Dibatalkan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mobil</label>
                        <select id="carFilter" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">Semua Mobil</option>
                            @foreach($bookings->pluck('car')->unique('id') as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button onclick="resetFilters()" class="px-4 py-2 text-gray-600 hover:text-gray-800 text-sm">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
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

        <!-- History List -->
        @if($bookings->count() > 0)
            <div class="space-y-4" id="bookingsList">
                @foreach($bookings as $booking)
                <div class="booking-item bg-white shadow rounded-lg" data-status="{{ $booking->status }}" data-car="{{ $booking->car->id }}">
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
                            <!-- Customer Info -->
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

                            <!-- Car Info -->
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

                            <!-- Booking Details -->
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

@push('scripts')
<script>
function filterBookings() {
    const statusFilter = document.getElementById('statusFilter').value;
    const carFilter = document.getElementById('carFilter').value;
    const bookingItems = document.querySelectorAll('.booking-item');

    bookingItems.forEach(item => {
        const itemStatus = item.getAttribute('data-status');
        const itemCar = item.getAttribute('data-car');
        
        let showItem = true;
        
        if (statusFilter && itemStatus !== statusFilter) {
            showItem = false;
        }
        
        if (carFilter && itemCar !== carFilter) {
            showItem = false;
        }
        
        item.style.display = showItem ? 'block' : 'none';
    });
}

function resetFilters() {
    document.getElementById('statusFilter').value = '';
    document.getElementById('carFilter').value = '';
    filterBookings();
}

// Event listeners for filters
document.getElementById('statusFilter').addEventListener('change', filterBookings);
document.getElementById('carFilter').addEventListener('change', filterBookings);
</script>
@endpush
@endsection