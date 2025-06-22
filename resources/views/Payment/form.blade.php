@extends('layouts.app')

@section('title', 'Form - Rental Partner')
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<section class="bg-white p-6 rounded shadow max-w-4xl mx-auto !mt-30 !mb-10">
  <h2 class="text-2xl font-bold mb-6 !text-center">Form Pemesanan</h2>

  @if ($errors->any())
  <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
    <ul>
      @foreach ($errors->all() as $error)
        <li>- {{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  {{-- pastikan method & action form ini sesuai --}}
  <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h3 class="font-semibold mb-2">Data Pribadi</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
      <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email" class="border p-2 rounded" required>
      <input type="tel" name="phone" placeholder="Nomor Telepon" class="border p-2 rounded" required>
      <input type="text" name="address" placeholder="Alamat" class="border p-2 rounded md:col-span-2" required>
      <div class="space-y-4 md:col-span-2">
        <div class="relative w-full">
          <label class="block mb-1 text-sm text-black text-left">Foto KTP (PDF/JPG/PNG)</label>
          <input 
            type="file" 
            name="ktp" 
            accept=".pdf,.jpg,.jpeg,.png" 
            required 
            class="w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-2 
                   file:text-sm file:font-semibold
                   file:bg-blue-600 file:text-white
                   hover:file:bg-white hover:file:text-blue-600" />
        </div>

        <div class="relative w-full mt-4">
          <label class="block mb-1 text-sm text-black text-left">Foto SIM (PDF/JPG/PNG)</label>
          <input 
            type="file" 
            name="sim" 
            accept=".pdf,.jpg,.jpeg,.png" 
            required 
            class="w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-2 
                   file:text-sm file:font-semibold
                   file:bg-blue-600 file:text-white
                   hover:file:bg-white hover:file:text-blue-600" />
        </div>
      </div>
    </div>

    <h3 class="font-semibold mb-2">Detail Sewa Mobil</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
  <div>
    <label for="start_date" class="block mb-1 font-medium text-gray-700">Tanggal Mulai</label>
    <input id="start_date" name="start_date" type="date" 
        class="border p-2 rounded w-full" 
        min="{{ date('Y-m-d') }}" required />
</div>

<div>
    <label for="end_date" class="block mb-1 font-medium text-gray-700">Tanggal Selesai</label>
    <input id="end_date" name="end_date" type="date" 
        class="border p-2 rounded w-full" 
        min="{{ date('Y-m-d') }}" required />
</div>


      <input name="pickup_location" type="text" placeholder="Lokasi Pengambilan" class="border p-2 rounded" required>
      <input name="return_location" type="text" placeholder="Lokasi Pengembalian" class="border p-2 rounded" required>

      {{-- input hidden untuk post dan owner --}}
      <input type="hidden" name="postingan_id" value="{{ $post->id ?? '' }}">
      <input type="hidden" name="owner_id" value="{{ $post->owner_id ?? '' }}">
    </div>

    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition !ml-85">
      Pesan Sekarang
    </button>
  </form>
</section>
@endsection
