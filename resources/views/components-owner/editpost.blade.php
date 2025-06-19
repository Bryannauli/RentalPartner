@extends('owner.layout')

@section('title', 'Edit Postingan Mobil')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Edit Postingan Mobil</h2>

    <form action="{{ route('owner.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            <div>
                <label for="car_name" class="block text-sm font-medium text-slate-700">Nama Mobil</label>
                <input type="text" name="car_name" id="car_name" value="{{ $post->car_name }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="capacity" class="block text-sm font-medium text-slate-700">Kapasitas</label>
                <input type="text" name="capacity" id="capacity" value="{{ $post->capacity }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="year" class="block text-sm font-medium text-slate-700">Tahun Keluaran Mobil</label>
                <input type="text" name="year" id="year" value="{{ $post->year }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="transmission" class="block text-sm font-medium text-slate-700">Transmisi</label>
                <input type="text" name="transmission" id="transmission" value="{{ $post->transmission }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="facilities" class="block text-sm font-medium text-slate-700">Fasilitas</label>
                <input type="text" name="facilities" id="facilities" value="{{ $post->facilities }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="mileage" class="block text-sm font-medium text-slate-700">Jarak Tempuh</label>
                <input type="text" name="mileage" id="mileage" value="{{ $post->mileage }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="baggage" class="block text-sm font-medium text-slate-700">Bagasi</label>
                <input type="text" name="baggage" id="baggage" value="{{ $post->baggage }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-slate-700">Tipe Mobil</label>
                <input type="text" name="type" id="type" value="{{ $post->type }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
            <div>
                <label for="brand" class="block text-sm font-medium text-slate-700">Brand Mobil</label>
                <input type="text" name="brand" id="brand" value="{{ $post->brand }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-slate-700">Harga Sewa per Hari</label>
                <div class="relative mt-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">Rp</span>
                    </div>
                    <input type="number" name="price" id="price" value="{{ $post->price }}" class="block w-full rounded-md border-slate-300 pl-8 pr-12" required>
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">{{ $post->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700">Foto Mobil</label>
                <div class="mt-1">
                    @if ($post->photo)
                        <img src="{{ asset('storage/photos/' . $post->photo) }}" alt="Foto Mobil" class="mb-4 w-40 h-auto rounded">
                    @endif
                    <input type="file" name="photo" class="block w-full text-sm text-slate-600">
                    <p class="text-xs text-slate-500">Biarkan kosong jika tidak ingin mengubah foto. PNG, JPG, GIF hingga 10MB.</p>
                </div>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-slate-700">Lokasi Penjemputan</label>
                <input type="text" name="location" id="location" value="{{ $post->location }}" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm">
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <a href="{{ route('owner.dashboard') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
