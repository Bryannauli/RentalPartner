@extends('owner.layout')

@section('title', 'Histori Penyewaan')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Histori Penyewaan</h1>
            <p class="mt-2 text-gray-600">Riwayat pemesanan mobil Anda</p>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
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
                        <p class="text-sm font-medium text-gray-500">Total Pesanan Selesai</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $pesanans->count() }}</p>
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
                        <p class="text-lg font-semibold text-gray-900">Rp {{ number_format($pesanans->sum('total_price'), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($pesanans->count() > 0)
            <div class="space-y-4">
                @foreach($pesanans as $pesanan)
                <div class="booking-item bg-white shadow rounded-lg">
                    <div class="px-6 py-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Pesanan #{{ $pesanan->id }}
                                </h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    bg-blue-100 text-blue-800">
                                    Selesai
                                </span>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($pesanan->updated_at)->format('d M Y') }}</p>
                                <p class="text-lg font-semibold text-gray-900">Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Penyewa</h4>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-600">{{ $pesanan->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $pesanan->user->email }}</p>
                                    @if($pesanan->phone)
                                        <p class="text-sm text-gray-500">{{ $pesanan->phone }}</p>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Mobil</h4>
                                <div class="flex items-center space-x-3">
                                    @if($pesanan->postingan->photo)
                                        <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->postingan->name }}" class="w-12 h-12 object-cover">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $pesanan->postingan->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $pesanan->postingan->brand }} {{ $pesanan->postingan->year }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Detail Sewa</h4>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}</p>
                                    <p class="text-sm text-gray-500">{{ $pesanan->duration }} hari</p>
                                </div>
                            </div>
                        </div>

                        @if($pesanan->notes)
                        <div class="mt-4 p-3 bg-gray-50 rounded">
                            <p class="text-sm text-gray-600">
                                <span class="font-medium">Catatan:</span> {{ $pesanan->notes }}
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
@endsection
