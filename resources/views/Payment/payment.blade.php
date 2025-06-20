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
                    <option value="cash">Tunai</option>
                    <option value="credit_card">Kartu Kredit</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti Pembayaran</label>
                <input type="file" name="payment_proof" id="payment_proof" class=" w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-md file:border-2 
                   file:text-sm file:font-semibold
                   file:bg-blue-600 file:text-white
                   hover:file:bg-white hover:file:text-blue-600" required accept="image/*"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <button type="submit"
                class="bg-blue-600 text-white ml-45 px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                Konfirmasi Pembayaran
            </button>
        </form>
    </div>
</div>
@endsection
