@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100 font-sans">

  {{-- Navbar --}}
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
      <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">SewaMobil</a>
      <ul class="flex space-x-6 text-gray-700">
        <li><a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a></li>
        <li><a href="{{ url('/cars') }}" class="hover:text-blue-600">Mobil</a></li>
        <li><a href="{{ url('/upgrade') }}" class="hover:text-blue-600 font-semibold">Upgrade</a></li>
        <li><a href="{{ url('/logout') }}" class="hover:text-red-500">Logout</a></li>
      </ul>
    </div>
  </nav>

  {{-- Konten Form Upgrade --}}
  <div class="max-w-3xl mx-auto mt-16 bg-white p-10 rounded-xl shadow-md !mb-10">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Upgrade Akun - Ingin Menyewakan Mobil?</h1>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/submit-upgrade') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
      @csrf

      {{-- Informasi Pribadi --}}
      <div>
        <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Informasi Pribadi</h2>
        <div class="space-y-4">
          <input type="text" name="nik" placeholder="NIK" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" />
          <input type="text" name="phone" placeholder="No Telepon" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" />
          <textarea name="address" placeholder="Alamat Lengkap" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 resize-none"></textarea>
        </div>
      </div>

      {{-- Upload Dokumen --}}
      <div>
        <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Unggah Dokumen</h2>
        <div class="space-y-4">

          {{-- KTP --}}
          <div class="relative w-full">
            <label class="block mb-1 text-sm text-gray-600">Foto KTP (PDF/JPG/PNG)</label>
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

          {{-- SIM --}}
          <div class="relative w-full">
            <label class="block mb-1 text-sm text-gray-600">Foto SIM (PDF/JPG/PNG)</label>
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

          {{-- STNK --}}
          <div class="relative w-full">
            <label class="block mb-1 text-sm text-gray-600">Foto STNK (PDF/JPG/PNG)</label>
            <input 
              type="file" 
              name="stnk" 
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

      {{-- Tombol Submit --}}
      <div class="text-center pt-4">
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
          Kirim Permintaan Upgrade
        </button>
      </div>
    </form>
  </div>
</body>
@endsection
