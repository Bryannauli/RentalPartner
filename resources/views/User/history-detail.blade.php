@extends('layouts.app')

@section('title', 'Invoice Pesanan')
   <script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg">
        <div class="p-8">
            <div class="flex justify-between items-start mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">INVOICE</h1>
                    <p class="text-sm text-gray-500">
                        Invoice #: INV-{{ str_pad($pesanan->id, 6, '0', STR_PAD_LEFT) }}
                    </p>
                    <p class="text-sm text-gray-500">
                        Tanggal Terbit: {{ \Carbon\Carbon::parse($pesanan->created_at)->format('d M Y') }}
                    </p>
                </div>
                <div class="text-right">
                    @php
                        $statusInfo = [
                            'Selesai' => ['text' => 'LUNAS', 'class' => 'bg-green-100 text-green-800'],
                            'Menunggu Pembayaran' => ['text' => 'BELUM DIBAYAR', 'class' => 'bg-yellow-100 text-yellow-800'],
                            'Sedang Berjalan' => ['text' => 'AKTIF', 'class' => 'bg-blue-100 text-blue-800'],
                        ];
                        $currentStatus = $statusInfo[$pesanan->status] ?? ['text' => strtoupper($pesanan->status), 'class' => 'bg-gray-100 text-gray-800'];
                    @endphp
                    <span class="inline-block px-4 py-2 rounded-full text-lg font-semibold {{ $currentStatus['class'] }}">
                        {{ $currentStatus['text'] }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Ditagihkan Kepada:</h3>
                    <p class="text-gray-600">{{ $pesanan->user->name ?? 'Nama Pelanggan' }}</p>
                    <p class="text-gray-600">{{ $pesanan->user->email ?? 'email@pelanggan.com' }}</p>
                    <p class="text-gray-600">{{ $pesanan->user->phone ?? 'No. Telepon Pelanggan' }}</p>
                </div>
                <div class="text-left md:text-right">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Dari:</h3>
                    <p class="text-gray-600">RentalPartner</p>
                    <p class="text-gray-600">Jl. Tuntungan Baru, No.16, Medan 20154</p>
                    <p class="text-gray-600">info@rentalpartner.com</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 font-semibold text-gray-600 border-b">Deskripsi</th>
                            <th class="px-4 py-3 font-semibold text-gray-600 border-b text-center">Durasi</th>
                            <th class="px-4 py-3 font-semibold text-gray-600 border-b text-right">Harga/Hari</th>
                            <th class="px-4 py-3 font-semibold text-gray-600 border-b text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $harga_per_hari = ($pesanan->duration > 0) ? ($pesanan->total_price / $pesanan->duration) : 0;
                        @endphp
                        <tr>
                            <td class="p-4 border-b">
                                <p class="font-medium text-gray-800">{{ $pesanan->postingan->car_name }}</p>
                                <p class="text-sm text-gray-500">{{ $pesanan->postingan->brand }} • {{ $pesanan->postingan->year }}</p>
                                <p class="text-sm text-gray-500">
                                    Periode: {{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}
                                </p>
                            </td>
                            <td class="p-4 border-b text-center">{{ $pesanan->duration }} Hari</td>
                            <td class="p-4 border-b text-right">Rp {{ number_format($harga_per_hari, 0, ',', '.') }}</td>
                            <td class="p-4 border-b text-right">Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mt-6">
                <div class="w-full max-w-xs space-y-2 text-gray-700">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg text-gray-800 pt-2 border-t">
                        <span>Total</span>
                        <span>Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                @if($pesanan->notes)
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Catatan Tambahan</h3>
                    <p class="text-sm text-gray-600 bg-gray-50 p-4 rounded-lg border">{{ $pesanan->notes }}</p>
                @endif
            </div>
            
            @if($pesanan->status === 'Menunggu Pembayaran')
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Metode Pembayaran</h3>
                <div class="text-sm text-gray-600 bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <p>Silakan lakukan pembayaran ke rekening berikut:</p>
                    <p class="font-semibold mt-2">Bank XYZ - 1234567890</p>
                    <p>a.n. Perusahaan Rental Anda</p>
                    <p class="mt-2">Setelah melakukan pembayaran, mohon konfirmasi dengan menekan tombol di bawah.</p>
                </div>
            </div>
            @endif

            <div class="mt-10 text-center">
                @if($pesanan->status === 'Menunggu Pembayaran')
                    <a href="{{ route('user.pembayaran.form', $pesanan->id) }}"
                       class="inline-block bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition shadow-md">
                        Bayar Invoice Ini
                    </a>
                @elseif($pesanan->status === 'Sedang Berjalan')
                    <p class="text-gray-600">Terima kasih telah memilih layanan kami. Selamat menikmati perjalanan Anda!</p>
                @elseif($pesanan->status === 'Selesai')
                     <p class="text-gray-600">Pembayaran telah kami terima. Terima kasih atas kepercayaan Anda.</p>
                @endif
            </div>

            <div class="mt-12 text-center text-sm text-gray-400 border-t pt-6">
                <p>Terima kasih telah menggunakan layanan kami.</p>
                <p>www.rentalpartner.com</p>
            </div>
        </div>
    </div>
</div>
@endsection