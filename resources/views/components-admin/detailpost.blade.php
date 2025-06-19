@extends('admin.layout')

@section('title', 'Detail Mobil')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            {{-- tampilkan foto pertama kalau ada --}}
            @if($post->photo)
                <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->car_name }}" class="w-full h-auto rounded-lg shadow-md">
            @else
                <img src="https://placehold.co/600x400/e2e8f0/475569?text=No+Image" alt="No Image" class="w-full h-auto rounded-lg shadow-md">
            @endif
        </div>
        
        <div>
            <h2 class="text-3xl font-bold text-slate-800">{{ $post->car_name }}</h2>
            <p class="text-lg text-slate-500 mb-6">{{ $post->type }}</p>
            
            <div class="grid grid-cols-2 gap-4 text-slate-700">
                <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Merek</div>
                    <div class="text-md font-bold">{{ $post->brand }}</div>
                </div>
                 <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Tipe Body</div>
                    <div class="text-md font-bold">{{ $post->type }}</div>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Tahun</div>
                    <div class="text-md font-bold">{{ $post->year }}</div>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Transmisi</div>
                    <div class="text-md font-bold">{{ $post->transmission }}</div>
                </div>
                 <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Kapasitas Mesin</div>
                    <div class="text-md font-bold">{{ $post->capacity }}</div>
                </div>
                 <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Fasilitas</div>
                    <div class="text-md font-bold">{{ $post->facilities }}</div>
                </div>
            </div>
            
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-2">Deskripsi</h3>
                <p class="text-slate-700">{{ $post->description ?? '-' }}</p>
            </div>
            
             <div class="mt-8 flex gap-4">
                <a href="{{ route('admin.posts') }}" class="flex-1 bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-3 px-4 rounded text-center">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection
