@extends('layouts.app')

@section('title', 'Invoice - Rental Partner')

@section('content')
<h1 class="text-2xl font-bold mb-6">Invoice Pembayaran</h1>

    <div class="mb-6 border p-4 rounded">
        <h3 class="text-lg font-semibold mb-2">Informasi Pemesan</h3>
        <p><strong>Nama:</strong> {{ $invoice['name'] ?? 'Nama Pemesan' }}</p>
        <p><strong>Email:</strong> {{ $invoice['email'] ?? 'email@example.com' }}</p>
        <p><strong>No. Telepon:</strong> {{ $invoice['phone'] ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $invoice['address'] ?? '-' }}</p>
    </div>

    <div class="mb-6 border p-4 rounded">
        <h3 class="text-lg font-semibold mb-2">Detail Sewa Mobil</h3>
        <p><strong>Mobil:</strong> {{ $invoice['car'] ?? 'Toyota Avanza' }}</p>
        <p><strong>Tanggal Mulai:</strong> {{ $invoice['start_date'] ?? '10 Mei 2025' }}</p>
        <p><strong>Tanggal Selesai:</strong> {{ $invoice['end_date'] ?? '13 Mei 2025' }}</p>
        <p><strong>Lokasi Pengambilan:</strong> {{ $invoice['pickup'] ?? 'Jakarta' }}</p>
        <p><strong>Lokasi Pengembalian:</strong> {{ $invoice['return'] ?? 'Jakarta' }}</p>
    </div>

    <div class="mb-6 border p-4 rounded">
        <h3 class="text-lg font-semibold mb-2">Pembayaran</h3>
        <p><strong>Metode Pembayaran:</strong> {{ $invoice['payment_method'] ?? 'Tunai' }}</p>
        <p><strong>Total Bayar:</strong> Rp {{ number_format($invoice['total'] ?? 1050000, 0, ',', '.') }}</p>
        <p><strong>Status:</strong> <span class="text-green-600 font-bold">Lunas</span></p>
    </div>

    <div class="text-center">
        <a href="{{ route('transactions.history') }}" class="bg-blue-600 text-white px-6 py-2 rounded">Lihat Riwayat Pemesanan</a>
    </div>
</div>
@endsection