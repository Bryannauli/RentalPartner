@extends('layouts.pay')

@section('title', 'Invoice - Rental Partner')

@section('content')
<h1 class="text-2xl font-bold mb-6">Invoice Pembayaran</h1>

<div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
    <p><strong>Nomor Invoice:</strong> {{ $invoice->number }}</p>
    <p><strong>Nama Pemesan:</strong> {{ $invoice->customer_name }}</p>
    <p><strong>Jumlah Pembayaran:</strong> Rp {{ number_format($invoice->amount, 0, ',', '.') }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ ucwords(str_replace('_', ' ', $invoice->payment_method)) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
    <p><strong>Tanggal:</strong> {{ $invoice->created_at->format('d M Y, H:i') }}</p>

    <a href="{{ route('payment') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Kembali ke Pembayaran</a>
</div>
@endsection