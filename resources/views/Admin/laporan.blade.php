@extends('admin.layout')

@section('title', 'Laporan - Rental Partner Admin')

@section('page-title', 'Laporan')

@section('content')
<div class="bg-white rounded-lg shadow p-5">
    <div class="mb-4 flex flex-wrap gap-4">
        <input type="text" placeholder="Cari laporan..." class="px-3 py-2 border border-gray-300 rounded flex-grow max-w-xs" />
        <select class="border border-gray-300 rounded px-3 py-2">
            <option value="all">Semua Tipe</option>
            <option value="user">Pengguna</option>
            <option value="car">Mobil</option>
            <option value="transaction">Transaksi</option>
        </select>
        <select class="border border-gray-300 rounded px-3 py-2">
            <option value="all">Semua Status</option>
            <option value="open">Terbuka</option>
            <option value="processing">Diproses</option>
            <option value="closed">Ditutup</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dilaporkan Oleh</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">4001</td>
                    <td class="px-6 py-4 whitespace-nowrap">Mobil tidak sesuai deskripsi</td>
                    <td class="px-6 py-4 whitespace-nowrap">Mobil</td>
                    <td class="px-6 py-4 whitespace-nowrap">Siti Nurhayati</td>
                    <td class="px-6 py-4 whitespace-nowrap">16 Mei 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Terbuka</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-1">
                        <button onclick="alert('Lihat laporan 4001')" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">Lihat</button>
                        <button onclick="alert('Proses laporan 4001')" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm">Proses</button>
                        <button onclick="if(confirm('Tutup laporan 4001?')) alert('Tutup')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm">Tutup</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection