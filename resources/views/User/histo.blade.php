@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20 mb-10">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Riwayat Pesanan Anda</h1>
            <p class="mt-2 text-gray-600">Lihat semua pesanan sewa mobil yang pernah Anda buat.</p>
        </div>

        @if($pesanans && !$pesanans->isEmpty())
            <form method="GET" action="{{-- route('history.index') --}}" class="mb-6 bg-white p-4 rounded-lg shadow">
                <div class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">Semua Status</option>
                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Sedang Berjalan" {{ request('status') == 'Sedang Berjalan' ? 'selected' : '' }}>Sedang Berjalan</option>
                            <option value="Dibatalkan" {{ request('status') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            <option value="Menunggu Pembayaran" {{ request('status') == 'Menunggu Pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                        </select>
                    </div>
                    
                </div>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm font-medium text-gray-500">Total Pesanan</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $pesanans->count() }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm font-medium text-green-600">Selesai</p>
                    <p class="text-2xl font-semibold text-green-800">{{ $pesanans->where('status', 'Selesai')->count() }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm font-medium text-blue-600">Sedang Berjalan</p>
                    <p class="text-2xl font-semibold text-blue-800">{{ $pesanans->where('status', 'Sedang Berjalan')->count() }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm font-medium text-red-600">Dibatalkan</p>
                    <p class="text-2xl font-semibold text-red-800">{{ $pesanans->where('status', 'Dibatalkan')->count() }}</p>
                </div>
            </div>

            <div class="space-y-4">
                @foreach ($pesanans as $pesanan)
                    <div class="bg-white shadow rounded-lg transition duration-300 hover:shadow-xl hover:border-blue-300 border border-transparent">
                        <div class="px-6 py-4">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 border-b pb-3">
                                <div class="flex items-center space-x-4 mb-2 sm:mb-0">
                                    <h3 class="text-lg font-bold text-gray-900">
                                        Pesanan #{{ $pesanan->invoice_number ?? $pesanan->id }}
                                    </h3>
                                    @php
                                        $statusClasses = [
                                            'Selesai' => 'bg-green-100 text-green-800',
                                            'Sedang Berjalan' => 'bg-blue-100 text-blue-800',
                                            'Dibatalkan' => 'bg-red-100 text-red-800',
                                            'Menunggu Pembayaran' => 'bg-yellow-100 text-yellow-800',
                                        ];
                                        $statusClass = $statusClasses[$pesanan->status] ?? 'bg-gray-100 text-gray-800';
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                        {{ $pesanan->status }}
                                    </span>
                                </div>
                                <div class="text-left sm:text-right">
                                    <p class="text-sm text-gray-500">Dipesan pada: {{ \Carbon\Carbon::parse($pesanan->created_at)->format('d M Y') }}</p>
                                    <p class="text-lg font-semibold text-blue-600">Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-1">
                                    <h4 class="text-md font-semibold text-gray-800 mb-2">Mobil Sewaan</h4>
                                    <div class="flex items-center space-x-3">
                                        @if($pesanan->postingan && $pesanan->postingan->photo)
                                            <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->car_name }}" class="w-20 h-20 object-cover rounded-lg">
                                        @else
                                            <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-car-side text-3xl text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-md font-bold text-gray-900">{{ $pesanan->car_name }}</p>
                                            {{-- Tambahin disini laa wee, kalau ada yang lain --}}
                                            {{-- <p class="text-sm text-gray-500">Toyota, 2022</p> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <h4 class="text-md font-semibold text-gray-800 mb-2">Detail Sewa</h4>
                                    <div class="space-y-2">
                                        <p class="text-sm text-gray-700">
                                            <i class="fas fa-calendar-alt w-5 text-center mr-2 text-blue-500"></i>
                                            <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }} &mdash; {{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}
                                        </p>
                                        <p class="text-sm text-gray-700">
                                            <i class="fas fa-clock w-5 text-center mr-2 text-blue-500"></i>
                                            @php
                                                $durasi = \Carbon\Carbon::parse($pesanan->start_date)->diffInDays(\Carbon\Carbon::parse($pesanan->end_date));
                                            @endphp
                                            <strong>Durasi:</strong> {{ $durasi }} hari
                                        </p>
                                        @if($pesanan->status === 'Dibatalkan' && !empty($pesanan->rejection_reason))
                                            <p class="text-sm text-red-600 mt-2 p-2 bg-red-50 rounded-md">
                                                <i class="fas fa-info-circle w-5 text-center mr-2"></i>
                                                <strong>Alasan pembatalan:</strong> {{ $pesanan->rejection_reason }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if(!empty($pesanan->notes))
                            <div class="mt-4 pt-3 border-t">
                                <p class="text-sm text-gray-600">
                                    <strong class="text-gray-800">Catatan Anda:</strong> {{ $pesanan->notes }}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                @if(method_exists($pesanans, 'links'))
                <div class="mt-6">
                    {{ $pesanans->withQueryString()->links() }}
                </div>
                @endif
            </div>
        @else
            <div class="text-center py-16 px-6 bg-white rounded-lg shadow-md">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Tidak Ada Riwayat Pesanan</h3>
                <p class="mt-1 text-sm text-gray-500">Anda belum pernah melakukan pemesanan mobil.</p>
                <div class="mt-6">
                    <a href="{{ url('/cars') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Mulai Sewa Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection