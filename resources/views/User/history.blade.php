@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-8 mt-24 mb-10">

        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Riwayat Pesanan Anda</h2>

        @if($pesanans && !$pesanans->isEmpty())
            <div class="space-y-6">
                @foreach ($pesanans as $pesanan)
                <div class="bg-white p-5 rounded-xl shadow-md border border-gray-200">
                    <div class="flex flex-col md:flex-row items-center gap-6">

                        {{-- Foto --}}
                        <div class="w-full md:w-1/4">
                            @if($pesanan->postingan && $pesanan->postingan->photo)
                                <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->car_name }}" class="w-full h-32 object-cover rounded-lg">
                            @endif
                        </div>

                        {{-- Detail --}}
                        <div class="w-full md:w-2/4">
                            <h3 class="text-xl font-bold text-gray-900">{{ $pesanan->postingan->car_name }}</h3>
                            <p class="text-sm text-gray-500">Order ID: #{{ $pesanan->invoice_number ?? $pesanan->id }}</p>
                            <p class="text-sm text-gray-600 mt-2">
                                {{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }} &mdash;
                                {{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}
                            </p>
                            <p class="text-lg font-semibold text-blue-600 mt-1">
                                Total: Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}
                            </p>
                        </div>

                        {{-- Status & Tombol --}}
                        <div class="w-full md:w-1/4 text-center md:text-right space-y-2">
                            @php
                                $statusClasses = [
                                    'Selesai' => 'bg-green-100 text-green-800',
                                    'Peminjaman Berlangsung' => 'bg-blue-100 text-blue-800',
                                    'Dibatalkan' => 'bg-red-100 text-red-800',
                                    'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                    'Menunggu Konfirmasi Owner' => 'bg-purple-100 text-purple-800',
                                    'Menunggu Konfirmasi' => 'bg-gray-100 text-gray-800',
                                ];
                                $statusClass = $statusClasses[$pesanan->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp

                            <span class="text-sm font-medium px-3 py-1 rounded-full {{ $statusClass }}">
                                {{ $pesanan->status }}
                            </span>

                            {{-- Tombol aksi dinamis berdasarkan status --}}
                            @if($pesanan->status === 'Menunggu Pembayaran')
                                <a href="{{ route('user.payment.form', $pesanan->id) }}"
                                    class="block w-full md:w-auto bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 text-sm font-semibold transition duration-200">
                                    Konfirmasi Pembayaran
                                </a>

                            @elseif($pesanan->status === 'Peminjaman Berlangsung')
                                <form action="{{ route('user.rent.complete', $pesanan->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full md:w-auto bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-sm font-semibold transition duration-200">
                                        Selesai Meminjam
                                    </button>
                                </form>

                            @endif

                            <a href="{{route('user.history.detail', $pesanan->id)}}"
                                class="block w-full md:w-auto bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 text-sm font-semibold transition duration-200">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 px-6 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-medium text-gray-900">Tidak Ada Riwayat Pesanan</h3>
                <p class="mt-1 text-sm text-gray-500">Anda belum pernah melakukan pemesanan mobil.</p>
                <div class="mt-6">
                    <a href="{{ url('/cars') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-medium">
                        Mulai Sewa Sekarang
                    </a>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
