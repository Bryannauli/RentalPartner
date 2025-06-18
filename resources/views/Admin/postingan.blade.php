@extends('admin.layout')

@section('title', 'Postingan Mobil - Rental Partner Admin')

@section('page-title', 'Postingan Mobil')

@section('content')
<div class="bg-white rounded-lg shadow p-5">
    <div class="mb-4 flex flex-wrap gap-4">
        <input type="text" placeholder="Cari postingan..." class="px-3 py-2 border border-gray-300 rounded flex-grow max-w-xs" />
        <select class="border border-gray-300 rounded px-3 py-2">
            <option value="all">Semua Status</option>
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
            <option value="suspended">Ditangguhkan</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobil</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga/Hari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Upload</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">3001</td>
                    <td class="px-6 py-4 whitespace-nowrap">Toyota Avanza 2023</td>
                    <td class="px-6 py-4 whitespace-nowrap">Budi Santoso</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp 350.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">17 Mei 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-1">
                        <button onclick="alert('Lihat postingan 3001')" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">Lihat</button>
                        <button onclick="alert('Edit postingan 3001')" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">Tangguhkan</button>
                        <button onclick="if(confirm('Tangguhkan postingan 3001?')) alert('Tertangguhkan')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm">Hapus</button>
                    </td>
                </tr>
                {{-- Tambah data disini --}}
            </tbody>
        </table>
    </div>
</div>
@endsection