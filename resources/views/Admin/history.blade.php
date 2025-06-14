@extends('admin.layout')

@section('title', 'Riwayat Transaksi - Rental Partner Admin')

@section('page-title', 'Riwayat Transasksi')

@section('content')

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Riwayat Transaksi</h2>
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nama Pengguna</th>
                <th class="px-4 py-2">Mobil</th>
                <th class="px-4 py-2">Tanggal Sewa</th>
                <th class="px-4 py-2">Durasi</th>
                <th class="px-4 py-2">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">T001</td>
                <td class="px-4 py-2">Dewi Lestari</td>
                <td class="px-4 py-2">Avanza 2023</td>
                <td class="px-4 py-2">10 Mei 2025</td>
                <td class="px-4 py-2">3 Hari</td>
                <td class="px-4 py-2">Rp 1.050.000</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection