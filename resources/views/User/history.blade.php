@extends('layouts.app')

@section('title', 'Riwayat Pesanan')
   <script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="bg-gray-100 min-h-screen py-16 mt-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-10 text-center text-gray-800">Riwayat Pesanan Anda</h2>

        @if($pesanans && !$pesanans->isEmpty())
            <div class="space-y-6">
                @foreach ($pesanans as $pesanan)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="flex flex-col md:flex-row items-center gap-6">

                        {{-- Foto Mobil --}}
                        <div class="w-full md:w-1/4">
                            @if($pesanan->postingan && $pesanan->postingan->photo)
                                <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->postingan->car_name }}" class="w-full h-32 object-cover rounded-lg">
                            @endif
                        </div>

                        {{-- Informasi Mobil & Jadwal --}}
                        <div class="w-full md:w-2/4">
                            <h3 class="text-xl font-bold text-gray-900">{{ $pesanan->postingan->car_name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">Order ID: #{{ $pesanan->invoice_number ?? $pesanan->id }}</p>
                            <p class="text-sm text-gray-600 mt-2">
                                {{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }} &mdash;
                                {{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}
                            </p>
                            <p class="text-lg font-semibold text-blue-600 mt-1">
                                Total: Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}
                            </p>
                        </div>

                        {{-- Status dan Aksi --}}
                        <div class="w-full md:w-1/4 text-center md:text-right space-y-3">
                            @php
                                $statusClasses = [
                                    'Selesai' => 'bg-green-100 text-green-800',
                                    'Peminjaman Berlangsung' => 'bg-blue-100 text-blue-800',
                                    'Dibatalkan' => 'bg-red-100 text-red-800',
                                    'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                    'Menunggu Konfirmasi Owner' => 'bg-purple-100 text-purple-800 ',
                                    'Menunggu Konfirmasi' => 'bg-gray-100 text-gray-800',
                                ];
                                $statusClass = $statusClasses[$pesanan->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp

                           <span class="inline-block w-full md:w-auto text-xs font-semibold px-4 py-1 rounded-full text-center {{ $statusClass }}">
    {{ $pesanan->status }}
</span>


                            @if($pesanan->status === 'Menunggu Pembayaran')
                                <a href="{{ route('user.payment.form', $pesanan->id) }}"
                                   class="block bg-yellow-500 text-white px-4 py-2 rounded-md text-sm hover:bg-yellow-600 transition">
                                    Konfirmasi Pembayaran
                                </a>

                            @elseif($pesanan->status === 'Peminjaman Berlangsung')
                                <form action="{{ route('user.rent.complete', $pesanan->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                                        Selesai Meminjam
                                    </button>
                                </form>
                            @endif

                            <a href="{{ route('user.history.detail', $pesanan->id) }}"
                               class="block bg-gray-200 text-gray-800 px-4 mt-5 py-2 rounded-md text-sm hover:bg-gray-300 transition">
                                Lihat Invoice
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 px-6 bg-white rounded-xl shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800">Tidak Ada Riwayat Pesanan</h3>
                <p class="mt-2 text-sm text-gray-500">Anda belum pernah melakukan pemesanan mobil.</p>
                <div class="mt-6">
                    <a href="{{ url('index') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-md text-sm font-medium transition">
                        Mulai Sewa Sekarang
                    </a>
                </div>
            </div>
        @endif

    </div>
</div>
@endsection