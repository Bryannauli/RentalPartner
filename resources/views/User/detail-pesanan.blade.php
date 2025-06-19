@extends('layouts.app')

@section('title', 'Detail Pesanan #' . ($order->invoice_number ?? $order->id))

@section('content')
<div class="bg-gray-50 py-12 pt-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-6">
            <a href="{{ route('user.history') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Kembali ke Riwayat Pesanan
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b pb-4 mb-6">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Detail Pesanan</h2>
                        <p class="text-sm text-gray-500 mt-1">Invoice #{{ $order->invoice_number ?? $order->id }}</p>
                    </div>
                    @php
                        $statusClasses = [
                            'Selesai' => 'bg-green-100 text-green-800',
                            'Sedang Berjalan' => 'bg-blue-100 text-blue-800',
                            'Dibatalkan' => 'bg-red-100 text-red-800',
                            'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                        ];
                        $statusClass = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800';
                    @endphp
                    <div class="mt-4 sm:mt-0 px-4 py-1.5 text-base font-semibold rounded-full {{ $statusClass }}">
                        {{ $order->status }}
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    
                    <div class="md:col-span-2 space-y-6">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2">Kendaraan Dipesan</h3>
                            <div class="flex items-center gap-4 p-4 border rounded-lg">
                                <img src="{{ asset('storage/' . $order->car->photo) }}" alt="{{ $order->car->car_name }}" class="w-28 h-20 object-cover rounded-md">
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $order->car->car_name }}</p>
                                    <p class="text-sm text-gray-500">{{ $order->car->brand }} / {{ $order->car->type }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class="font-bold text-lg text-gray-800 mb-2">Periode Sewa</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="p-4 border rounded-lg">
                                    <p class="text-sm text-gray-500">Tanggal Mulai</p>
                                    <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($order->start_date)->format('l, d F Y') }}</p>
                                </div>
                                <div class="p-4 border rounded-lg">
                                    <p class="text-sm text-gray-500">Tanggal Selesai</p>
                                    <p class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($order->end_date)->format('l, d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <div class="bg-gray-50 p-6 rounded-lg border">
                            <h3 class="font-bold text-lg text-gray-800 border-b pb-3 mb-4">Rincian Biaya</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Harga Sewa per Hari</span>
                                    <span class="font-medium text-gray-900">Rp {{ number_format($order->car->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Durasi Sewa</span>
                                    <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($order->end_date)->diffInDays(\Carbon\Carbon::parse($order->start_date)) }} Hari</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-900">Total Pembayaran</span>
                                <span class="text-xl font-bold text-blue-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <button onclick="window.print()" class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                                <i class="fas fa-print mr-2"></i> Cetak Invoice
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection