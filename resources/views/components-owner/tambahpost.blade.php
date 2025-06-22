@extends('owner.layout')

@section('title', 'Buat Postingan Baru')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Formulir Postingan Mobil Baru</h2>

    <form action="{{ route('owner.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">

            <div>
                <label for="brand" class="block text-sm font-medium text-slate-700">Brand Mobil</label>
                <input type="text" name="brand" id="brand" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Contoh: Toyota">
            </div>

            <div>
                <label for="car_name" class="block text-sm font-medium text-slate-700">Model Mobil</label>
                <input type="text" name="car_name" id="car_name" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Contoh: Avanza">
            </div>

            {{-- Kapasitas --}}
            <div>
                <label for="capacity" class="block text-sm font-medium text-slate-700">Kapasitas</label>
                <select name="capacity" id="capacity" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                    <option value="">-- Pilih Kapasitas --</option>
                    <option value="4 Orang">4 Orang</option>
                    <option value="6 Orang">6 Orang</option>
                    <option value="8 Orang">8 Orang</option>
                </select>
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-slate-700">Tahun Keluaran Mobil</label>
                <input type="text" name="year" id="year" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Contoh: 2018">
            </div>

            {{-- Transmisi --}}
            <div>
                <label for="transmission" class="block text-sm font-medium text-slate-700">Transmisi</label>
                <select name="transmission" id="transmission" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                    <option value="">-- Pilih Transmisi --</option>
                    <option value="Manual">Manual</option>
                    <option value="Otomatis">Automatic</option>
                    <option value="CVT">CVT</option>
                </select>
            </div>

            <div>
                <label for="facilities" class="block text-sm font-medium text-slate-700">Fasilitas</label>
                <input type="text" name="facilities" id="facilities" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Contoh: AC, Bluetooth, GPS">
            </div>

            <div>
                <label for="mileage" class="block text-sm font-medium text-slate-700">Jarak Tempuh</label>
                <input type="text" name="mileage" id="mileage" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Contoh: 4000 KM">
            </div>

            {{-- Bagasi --}}
            <div>
                <label for="baggage" class="block text-sm font-medium text-slate-700">Bagasi</label>
                <select name="baggage" id="baggage" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                    <option value="">-- Pilih Bagasi --</option>
                    <option value="2 Koper">2 Koper</option>
                    <option value="4 Koper">4 Koper</option>
                    <option value="6 Koper">6 Koper</option>
                </select>
            </div>

            {{-- Tipe Mobil --}}
            <div>
                <label for="type" class="block text-sm font-medium text-slate-700">Tipe Mobil</label>
                <select name="type" id="type" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
                    <option value="">-- Pilih Tipe Mobil --</option>
                    <option value="City Car">City Car</option>
                    <option value="SUV">SUV</option>
                    <option value="MPV">MPV</option>
                    <option value="Luxury">Luxury</option>
                </select>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-slate-700">Harga Sewa per Hari</label>
                <div class="relative mt-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">Rp</span>
                    </div>
                    <input type="number" name="price" id="price" class="block w-full rounded-md border-slate-300 pl-8 pr-12" placeholder="0" required>
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Jelaskan kondisi mobil, fitur, dan syarat ketentuan..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Foto Mobil</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-slate-300 px-6 pt-5 pb-6">
                    <div class="space-y-1 text-center">
                        <i class="fas fa-camera-retro mx-auto h-12 w-12 text-slate-400"></i>
                        <div class="flex text-sm text-slate-600">
                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-blue-600 hover:text-blue-500">
                                <span>Unggah file</span>
                                <input id="file-upload" name="photo" type="file" class="sr-only" multiple>
                            </label>
                            <p class="pl-1">atau tarik dan lepas</p>
                        </div>
                        <p class="text-xs text-slate-500">PNG, JPG, GIF hingga 10MB</p>
                    </div>
                </div>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-slate-700">Lokasi Penjemputan</label>
                <input type="text" name="location" id="location" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm" placeholder="Contoh: Medan Amplas, Kota Medan">
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <button type="button" class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded">Batal</button>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Buat Postingan
            </button>
        </div>
    </form>
</div>
@endsection
