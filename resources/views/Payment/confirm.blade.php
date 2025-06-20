@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran - Rental Partner')

@section('content')

<section class="bg-white p-6 rounded shadow max-w-lg mx-auto">
  <h2 class="text-xl font-bold mb-4 text-center">Konfirmasi Pembayaran</h2>

  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
    Pembayaran berhasil! Pemesanan Anda telah dikonfirmasi.
  </div>

  <div class="text-center">
    <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded">Lihat Riwayat Pemesanan</a>
  </div>
</section>
@endsection