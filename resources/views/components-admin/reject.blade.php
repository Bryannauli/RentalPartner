@extends('admin.layout')

@section('title', 'Alasan Penolakan - Rental Partner Admin')

@section('page-title', 'Alasan Penolakan Postingan')

@section('content')
<div class="bg-white rounded-lg shadow p-5">
    <h3 class="text-xl font-semibold mb-4">
        Tolak Postingan: <span class="font-bold text-blue-600">{{ $post->car_name }} {{ $post->year }}</span> (ID: {{ $post->id }})
    </h3>

    <p class="mb-4 text-gray-600">
        Anda akan menolak postingan ini. Mohon berikan alasan yang jelas agar pemilik mobil dapat memahami dan memperbaikinya.
    </p>

    <form action="{{ route('admin.posts.reject', $post->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="rejection_reason" class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan <span class="text-red-500">*</span></label>
            <textarea 
                id="rejection_reason" 
                name="rejection_reason" 
                class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500 @error('rejection_reason') border-red-500 @enderror" 
                rows="5" 
                placeholder="Contoh: Foto mobil tidak jelas, informasi STNK tidak sesuai, harga tidak wajar." 
                required>{{ old('rejection_reason') }}</textarea>
            @error('rejection_reason')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Kirim Penolakan
            </button>
            <a href="{{ route('admin.posts') }}" class="text-gray-600 hover:text-gray-900">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection