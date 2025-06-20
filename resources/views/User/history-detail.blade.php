@extends('layouts.app')

@section('title', 'Detail Pesanan')
   <script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="bg-gray-100 min-h-screen py-16">
    <div class="max-w-4xl mx-auto px-6 py-8 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8 text-center">Detail Pesanan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Info Mobil --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Informasi Mobil</h3>
                <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->car_name }}" class="w-full h-48 object-cover rounded-lg shadow">
                <div class="mt-3 space-y-1 text-sm text-gray-600">
                    <p><strong>{{ $pesanan->postingan->car_name }}</strong> ({{ $pesanan->postingan->brand }} • {{ $pesanan->postingan->year }})</p>
                    <p class="capitalize">Transmisi: {{ $pesanan->postingan->transmission }}</p>
                </div>
            </div>

            {{-- Detail Pemesanan --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Detail Pemesanan</h3>
                <div class="space-y-2 text-sm text-gray-700">
                    <p>Tanggal Mulai: <strong>{{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }}</strong></p>
                    <p>Tanggal Selesai: <strong>{{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}</strong></p>
                    <p>Durasi: <strong>{{ $pesanan->duration }} hari</strong></p>
                    <p>Total Biaya: <strong>Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</strong></p>
                    <p class="mt-2">Status: 
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
        </div>

        {{-- Catatan --}}
        @if($pesanan->notes)
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Tambahan</h3>
            <p class="text-sm text-gray-700 bg-gray-50 p-4 rounded-lg border">{{ $pesanan->notes }}</p>
        </div>
        @endif

        {{-- Dokumen --}}
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Foto SIM</h3>
                @if($pesanan->sim_path)
                    <img src="{{ asset('storage/' . $pesanan->sim_path) }}" alt="Foto SIM" class="rounded-lg border shadow">
                @else
                    <p class="text-sm text-gray-500 italic">Belum diunggah</p>
                @endif
            </div>

            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Foto KTP</h3>
                @if($pesanan->ktp_path)
                    <img src="{{ asset('storage/' . $pesanan->ktp_path) }}" alt="Foto KTP" class="rounded-lg border shadow">
                @else
                    <p class="text-sm text-gray-500 italic">Belum diunggah</p>
                @endif
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-10 text-center">
            @if($pesanan->status === 'Menunggu Pembayaran')
                <a href="{{ route('user.pembayaran.form', $pesanan->id) }}"
                   class="inline-block bg-blue-600 text-white font-semibold px-5 py-3 rounded-lg hover:bg-blue-700 transition">
                    Konfirmasi Pembayaran
                </a>
            @elseif($pesanan->status === 'Sedang Berjalan')
                <form action="{{ route('user.pesanan.selesai', $pesanan->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                            class="bg-green-600 text-white font-semibold px-5 py-3 rounded-lg hover:bg-green-700 transition">
                        Selesai Meminjam
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection