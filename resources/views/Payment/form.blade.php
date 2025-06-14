@extends('layouts.app')

@section('title', 'Form - Rental Partner')

@section('content')
<section class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
  <h2 class="text-2xl font-bold mb-6">Form Pemesanan</h2>

  <h3 class="font-semibold mb-2">Data Pribadi</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <input type="email" placeholder="Email" class="border p-2 rounded">
    <input type="tel" placeholder="Nomor Telepon" class="border p-2 rounded">
    <input type="text" placeholder="Alamat" class="border p-2 rounded md:col-span-2">
    <input type="file" class="border p-2 rounded">
    <input type="file" class="border p-2 rounded">
  </div>

  <h3 class="font-semibold mb-2">Detail Sewa Mobil</h3>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <input type="date" class="border p-2 rounded">
    <input type="date" class="border p-2 rounded">
    <input type="text" placeholder="Lokasi Pengambilan" class="border p-2 rounded">
    <input type="text" placeholder="Lokasi Pengembalian" class="border p-2 rounded">
  </div>

  <button class="bg-blue-600 text-white px-6 py-2 rounded">Pesan Sekarang</button>
</section>
@endsection