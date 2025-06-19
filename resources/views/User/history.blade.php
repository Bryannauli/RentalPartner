@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 mt-24 mb-10">

        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Riwayat Pesanan Anda</h2>

        @if($orders && !$orders->isEmpty())
            <div class="space-y-6">
                @foreach ($orders as $order)
                    <div class="bg-white p-5 rounded-xl shadow-md border border-gray-200 transition duration-300 hover:shadow-lg hover:border-blue-300">
                        <div class="flex flex-col md:flex-row items-center gap-6">
                            <div class="w-full md:w-1/4">
                                @if($order->car)
                                    <img src="{{ asset('storage/' . $order->car->photo) }}" alt="{{ $order->car->car_name }}" class="w-full h-32 object-cover rounded-lg">
                                @endif
                            </div>

                            <div class="w-full md:w-2/4">
                                <h3 class="text-xl font-bold text-gray-900">{{ $order->car->car_name ?? 'Mobil tidak ditemukan' }}</h3>
                                <p class="text-sm text-gray-500">
                                    Order ID: #{{ $order->invoice_number ?? $order->id }}
                                </p>
                                <p class="text-sm text-gray-600 mt-2">
                                    <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                    {{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }} &mdash; {{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }}
                                </p>
                                <p class="text-lg font-semibold text-blue-600 mt-1">
                                    Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="w-full md:w-1/4 text-center md:text-right">
                                @php
                                    $statusClasses = [
                                        'Selesai' => 'bg-green-100 text-green-800',
                                        'Sedang Berjalan' => 'bg-blue-100 text-blue-800',
                                        'Dibatalkan' => 'bg-red-100 text-red-800',
                                        'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                    ];
                                    $statusClass = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800';
                                @endphp

                                <span class="text-sm font-medium px-3 py-1 rounded-full {{ $statusClass }}">
                                    {{ $order->status }}
                                </span>

                                <a href="{{-- route('history.detail', $order->id) --}}" class="mt-3 block w-full md:w-auto bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 text-sm font-semibold text-center transition duration-200">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 px-6 bg-white rounded-lg shadow-md">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak Ada Riwayat Pesanan</h3>
                <p class="mt-1 text-sm text-gray-500">Anda belum pernah melakukan pemesanan mobil.</p>
                <div class="mt-6">
                    <a href="{{ url('/cars') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Mulai Sewa Sekarang
                    </a>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection