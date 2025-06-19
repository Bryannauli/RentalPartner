@extends('owner.layout')

@section('title', 'Status Postingan Mobil')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Status Postingan Mobil</h1>
            <p class="mt-2 text-gray-600">Lacak status konfirmasi untuk setiap mobil yang Anda sewakan.</p>
        </div>

        @if($posts->count() > 0)
            <div class="space-y-6">
                @foreach($posts as $post)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-3">
                        <div class="md:col-span-1">
                             @if($post->photo)
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->car_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-2 p-6">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">{{ $post->car_name }}</h2>
                                    <p class="text-md text-gray-600">{{ $post->brand }} - {{ $post->year }}</p>
                                    <p class="text-lg text-gray-800 font-semibold mt-1">Rp {{ number_format($post->price, 0, ',', '.') }} / hari</p>
                                </div>
                                <div class="mt-3 sm:mt-0">
                                        @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'approved' => 'bg-green-100 text-green-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium  {{$statusColors[$post->status] ?? 'bg-gray-100 text-gray-800'}}">
                                        {{ucfirst($post->status)}}
                                    </span>
                                </div>
                            </div>

                            <p class="mt-2 text-sm text-gray-500">
                                Diposting pada {{ $post->created_at->format('d M Y') }}
                            </p>

                            @if($post->status === 'approved')
                                <div class="mt-4 p-3 bg-green-50 rounded-lg">
                                    <p class="text-sm text-green-700">
                                        <i class="fas fa-check-circle mr-2"></i>Postingan Anda telah dikonfirmasi dan sekarang tampil di halaman dashboard dan pencarian.
                                    </p>
                                </div>
                            @elseif($post->status === 'rejected' && $post->rejection_reason)
                                <div class="mt-4 p-3 bg-red-50 rounded-lg">
                                    <p class="text-sm font-medium text-red-800">Alasan Penolakan:</p>
                                    <p class="text-sm text-red-700 mt-1">{{ $post->rejection_reason }}</p>
                                </div>
                            @else
                                <div class="mt-4 p-3 bg-yellow-50 rounded-lg">
                                    <p class="text-sm text-yellow-700">
                                        <i class="fas fa-clock mr-2"></i>Postingan Anda sedang ditinjau oleh administrator. Mohon tunggu untuk konfirmasi.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-white shadow rounded-lg">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Postingan</h3>
                <p class="mt-1 text-sm text-gray-500">Anda belum menambahkan mobil untuk disewakan.</p>
                
            </div>
        @endif
    </div>
</div>
@endsection