@extends('owner.layout')

@section('title', 'Pesanan Masuk')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Pesanan Masuk</h1>
            <p class="mt-2 text-gray-600">Kelola pesanan yang masuk untuk mobil Anda</p>
        </div>

        @if(count($pesanans) > 0)
            <div class="space-y-6">
                @foreach($pesanans as $pesanan)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">
                                Pesanan #{{ $pesanan->id }} - {{ $pesanan->car_name }}
                            </h3>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                {{ $pesanan->status === 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $pesanan->status }}
                            </span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Dipesan pada {{ $pesanan->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>

                    <div class="px-6 py-4 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Informasi Penyewa -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Informasi Penyewa</h4>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">Nama:</span>
                                        <span class="text-sm text-gray-900">{{ $pesanan->user->name }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">Email:</span>
                                        <span class="text-sm text-gray-900">{{ $pesanan->user->email }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">No. HP:</span>
                                        <span class="text-sm text-gray-900">{{ $pesanan->phone ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Detail Pemesanan -->
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Detail Pemesanan</h4>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Tanggal Mulai:</span>
                                        <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Tanggal Selesai:</span>
                                        <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Durasi:</span>
                                        <span class="text-sm text-gray-900">{{ $pesanan->duration }} hari</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Total Biaya:</span>
                                        <span class="text-sm font-semibold text-gray-900">Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($pesanan->notes)
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Catatan Tambahan</h4>
                            <p class="text-sm text-gray-600 bg-gray-50 p-3 rounded">{{ $pesanan->notes }}</p>
                        </div>
                        @endif

                        <!-- Postingan -->
                        <div class="p-4 bg-gray-50 rounded-lg flex items-center space-x-4">
                            <h4 class="text-sm font-medium text-gray-900">Postingan</h4>
                            @if($pesanan->postingan->photo)
                                <img src="{{ asset('storage/' . $pesanan->postingan->photo) }}" alt="{{ $pesanan->car_name }}" class="w-40 rounded" />
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Dokumen Pendukung -->
                        <div class="p-4 bg-gray-50 rounded-lg space-y-4">
                            <h4 class="text-sm font-medium text-gray-900">Dokumen Pendukung</h4>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['sim_path' => 'SIM', 'ktp_path' => 'KTP'] as $path => $label)
                                    @if($pesanan->$path)
                                        <img src="{{ asset('storage/' . $pesanan->$path) }}" alt="{{ $pesanan->car_name }}" class="w-40 rounded" />
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div class="p-4 bg-gray-50 rounded-lg">
                            @if($pesanan->payment_proof)
                                <h4 class="text-sm font-medium text-gray-900 mb-2">Bukti Pembayaran</h4>
                                <img src="{{ asset('storage/' . $pesanan->payment_proof) }}" alt="Bukti Pembayaran" class="w-40 rounded-md shadow" />
                            @else
                                <p class="text-sm text-gray-500">Belum ada bukti pembayaran.</p>
                            @endif
                        </div>

                        <!-- Informasi Mobil -->
                        <div>
                            <h5 class="text-sm font-medium text-gray-900">{{ $pesanan->car_name }}</h5>
                            <p class="text-sm text-gray-500">{{ $pesanan->brand }} • {{ $pesanan->year }}</p>
                            <p class="text-sm text-gray-500">{{ ucfirst($pesanan->transmission) }}</p>
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    @if($pesanan->status === 'Menunggu Konfirmasi Owner')
                    <form method="POST" action="{{ route('owner.pesanan.konfirmasi', $pesanan->id) }}" class="px-6 py-4 bg-gray-50 border-t border-gray-200 space-y-4">
                        @csrf
                        @method('PUT')

                        <button type="submit" name="action" value="accept" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-200">
                            Konfirmasi
                        </button>

                        <div>
                            <label for="rejection_reason_{{ $pesanan->id }}" class="block text-sm font-medium text-gray-700 mb-1">Alasan Penolakan</label>
                            <textarea id="rejection_reason_{{ $pesanan->id }}" name="rejection_reason" rows="3" placeholder="Tulis alasan penolakan..." class="w-full border border-gray-300 rounded-md px-3 py-2 resize-none focus:outline-none focus:ring-1 focus:ring-red-500"></textarea>
                            <button type="submit" name="action" value="reject" class="mt-2 px-4 py-2 border border-red-600 text-red-600 rounded-md hover:bg-red-50 transition duration-200">
                                Tolak Pesanan
                            </button>
                        </div>
                    </form>

                    @elseif($pesanan->status === 'Menunggu Konfirmasi Pembayaran')
                    <form method="POST" action="{{ route('owner.pesanan.konfirmasi.pembayaran', $pesanan->id) }}" class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200">
                            Konfirmasi Pembayaran
                        </button>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white shadow rounded-lg">
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pesanan masuk</h3>
                    <p class="mt-1 text-sm text-gray-500">Saat ini tidak ada pesanan yang menunggu konfirmasi.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
