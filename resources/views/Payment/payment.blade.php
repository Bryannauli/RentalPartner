@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')
 <script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="min-h-screen bg-gray-100 py-12 mt-10">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Konfirmasi Pembayaran</h2>

        <div class="mb-6">
            <p class="text-gray-600">Invoice: <span class="font-semibold">#{{ $pesanan->invoice_number ?? $pesanan->id }}</span></p>
            <p class="text-gray-600">Mobil: <span class="font-semibold">{{ $pesanan->postingan->car_name }}</span></p>
            <p class="text-gray-600">Total: <span class="font-bold text-blue-600">Rp {{ number_format($pesanan->total_price, 0, ',', '.') }}</span></p>
        </div>

        <form action="{{ route('user.payment.submit', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method" required class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">-- Pilih Metode --</option>
                    <option value="cash">Transfer Antar Bank</option>
                    <option value="credit_card">Kartu Debit</option>
                </select>
            </div>

            <div class="mt-4 mb-6 space-y-4">
                
                <div class="p-4 bg-gray-50 rounded-lg border">
                    <h3 class="font-semibold text-gray-800 mb-2">Pilihan 1: Langkah-langkah Transfer Bank</h3>
                    <ol class="list-decimal list-inside text-gray-600 space-y-1">
                        <li>Lakukan pembayaran ke salah satu rekening berikut:</li>
                        <ul class="list-disc list-inside ml-5 mt-1">
                            <li><strong>ABC:</strong> 1234567890 (a.n. RentalPartner)</li>
                            <li><strong>XYZ:</strong> 0987654321 (a.n. RentalPartner)</li>
                        </ul>
                        <li>Pastikan jumlah transfer sesuai dengan total tagihan.</li>
                        <li>Simpan dan unggah bukti transfer Anda pada kolom di bawah ini.</li>
                    </ol>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg border">
                    <h3 class="font-semibold text-gray-800 mb-2">Pilihan 2: Langkah-langkah Kartu Debit</h3>
                    <p class="text-gray-600">Anda akan diarahkan ke halaman pembayaran aman setelah menekan tombol konfirmasi. Mohon siapkan kartu debit Anda. (Upload bukti pembayaran juga diperlukan untuk metode ini).</p>
                </div>

            </div>
            <div class="mb-4">
                <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                <input type="file" name="payment_proof" id="payment_proof" class=" w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-2
                   file:text-sm file:font-semibold
                   file:bg-blue-600 file:text-white
                   hover:file:bg-white hover:file:text-blue-600" accept="image/*"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200">
                Konfirmasi Pembayaran
            </button>
        </form>
    </div>
</div>
@endsection