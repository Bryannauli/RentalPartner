@extends('layouts.app')

@section('title', 'Payment - Rental Partner')

@section('content')
<section class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
  <h2 class="text-2xl font-bold mb-6">Pembayaran</h2>

  <h3 class="mb-2 font-semibold">Metode Pembayaran</h3>
  <div class="space-y-2 mb-6">
    <label class="flex items-center gap-2">
      <input type="radio" name="metode" checked>
      Tunai
    </label>
    <label class="flex items-center gap-2">
      <input type="radio" name="metode">
      Kartu Kredit
    </label>
  </div>

  <h3 class="mb-2 font-semibold">Tata Cara Pembayaran</h3>
  <div class="grid gap-4 mb-6">
    <div class="border p-4 rounded">
      <h4 class="font-semibold">Tunai</h4>
      <p>Pembayaran langsung saat mobil diambil di lokasi.</p>
    </div>
    <div class="border p-4 rounded">
      <h4 class="font-semibold">Kartu Kredit</h4>
      <p>Pembayaran diproses otomatis setelah konfirmasi.</p>
    </div>
  </div>

  <button class="bg-green-600 text-white px-6 py-2 rounded">Konfirmasi Pembayaran</button>
</section>
@endsection