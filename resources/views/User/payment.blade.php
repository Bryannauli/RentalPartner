@extends('layouts.pay')

@section('title', 'Pembayaran - Rental Partner')

@section('content')
<h1 class="text-2xl font-bold mb-6">Halaman Pembayaran</h1>

<form id="payment-form" action="{{ route('payment.process') }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg mx-auto">
    @csrf

    <div class="mb-4">
        <label class="block mb-2 font-semibold">Jumlah Pembayaran (Rp)</label>
        <input type="number" name="amount" id="amount" class="w-full border border-gray-300 rounded px-3 py-2" required min="1">
    </div>

    <div class="mb-6">
        <label class="block mb-2 font-semibold">Metode Pembayaran</label>
        <select name="payment_method" id="payment_method" class="w-full border border-gray-300 rounded px-3 py-2" required>
            <option value="" disabled selected>Pilih metode bayar</option>
            <option value="credit_card">Kartu Kredit</option>
            <option value="bank_transfer">Transfer Bank</option>
            <option value="e_wallet">E-Wallet</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Bayar</button>
</form>

<!-- Popup Notification -->
<div id="payment-popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-lg p-6 max-w-sm w-full shadow-lg text-center">
        <div id="popup-message" class="text-lg font-semibold mb-4"></div>
        <button id="popup-close-btn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tutup</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const form = document.getElementById('payment-form');
        const popup = document.getElementById('payment-popup');
        const popupMessage = document.getElementById('popup-message');
        const popupCloseBtn = document.getElementById('popup-close-btn');

        form.addEventListener('submit', function(e){
            e.preventDefault();

            // Simulasi proses pembayaran, sesuaikan dengan AJAX/api pembayaran Anda
            const amount = document.getElementById('amount').value;
            const method = document.getElementById('payment_method').value;

            if(amount && method){
                // Simulasi hasil pembayaran random berhasil atau gagal
                const success = Math.random() > 0.3;  // 70% sukses

                if(success){
                    popupMessage.textContent = `Pembayaran sebesar Rp${amount} melalui ${method.replace('_', ' ')} berhasil!`;
                } else {
                    popupMessage.textContent = `Pembayaran gagal. Silakan coba lagi.`;
                }
                popup.classList.remove('hidden');
            }
        });

        popupCloseBtn.addEventListener('click', function(){
            popup.classList.add('hidden');
        });
    });
</script>
@endpush