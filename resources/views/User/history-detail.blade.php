@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Pesanan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Info Mobil --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Mobil</h3>
                <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->car_name }}" class="w-full h-40 object-cover rounded mb-3">
                <p class="text-sm text-gray-600">{{ $pesanan->postingan->car_name }} ({{ $pesanan->postingan->brand }} • {{ $pesanan->postingan->year }})</p>
                <p class="text-sm text-gray-600 capitalize">Transmisi: {{ $pesanan->postingan->transmission }}</p>
            </div>

            {{-- Detail Pemesanan --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Detail Pemesanan</h3>
                <p class="text-sm text-gray-600">Tanggal Mulai: <strong>{{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }}</strong></p>
                <p class="text-sm text-gray-600">Tanggal Selesai: <strong>{{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}</strong></p>
                <p class="text-sm text-gray-600">Durasi: <strong>{{ $pesanan->duration }} hari</strong></p>
                <p class="text-sm text-gray-600">Total Biaya: <strong>Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</strong></p>
                <p class="text-sm text-gray-600 mt-2">Status: 
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium
                        @if($pesanan->status === 'Selesai') bg-green-100 text-green-800
                        @elseif($pesanan->status === 'Menunggu Pembayaran') bg-yellow-100 text-yellow-800
                        @elseif($pesanan->status === 'Sedang Berjalan') bg-blue-100 text-blue-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ $pesanan->status }}
                    </span>
                </p>
            </div>
        </div>

        {{-- Catatan --}}
        @if($pesanan->notes)
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Tambahan</h3>
                <p class="text-sm text-gray-600 bg-gray-50 p-3 rounded">{{ $pesanan->notes }}</p>
            </div>
        @endif

        {{-- Dokumen --}}
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Foto SIM</h3>
                @if($pesanan->sim_path)
                    <img src="{{ asset('storage/' . $pesanan->sim_path) }}" alt="Foto SIM" class="rounded shadow">
                @else
                    <p class="text-sm text-gray-500 italic">Belum diunggah</p>
                @endif
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Foto KTP</h3>
                @if($pesanan->ktp_path)
                    <img src="{{ asset('storage/' . $pesanan->ktp_path) }}" alt="Foto KTP" class="rounded shadow">
                @else
                    <p class="text-sm text-gray-500 italic">Belum diunggah</p>
                @endif
            </div>
        </div>

        {{-- Aksi berdasarkan status --}}
        @if($pesanan->status === 'Menunggu Pembayaran')
            <div class="mt-6">
                <a href="{{ route('user.pembayaran.form', $pesanan->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Konfirmasi Pembayaran
                </a>
            </div>
        @elseif($pesanan->status === 'Sedang Berjalan')
            <div class="mt-6">
                <form action="{{ route('user.pesanan.selesai', $pesanan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Selesai Meminjam
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
