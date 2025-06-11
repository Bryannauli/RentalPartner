@extends('admin.layout')

@section('title', 'Pengguna - Rental Partner Admin')

@section('page-title', 'Pengguna')

@section('content')
<div class="bg-white rounded-lg shadow p-5">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Daftar Pengguna</h3>
        <button onclick="alert('Form tambah pengguna')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Tambah Pengguna</button>
    </div>
    <div class="mb-4 flex flex-wrap gap-4">
        <input type="text" placeholder="Cari pengguna..." class="px-3 py-2 border border-gray-300 rounded flex-grow max-w-xs" />
        <select class="border border-gray-300 rounded px-3 py-2">
            <option value="all">Semua Tipe</option>
            <option value="user">Pengguna Biasa</option>
            <option value="owner">Owner</option>
            <option value="admin">Admin</option>
        </select>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Akun</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Terdaftar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">1001</td>
                    <td class="px-6 py-4 whitespace-nowrap">Budi Santoso</td>
                    <td class="px-6 py-4 whitespace-nowrap">budi.santoso@email.com</td>
                    <td class="px-6 py-4 whitespace-nowrap">Owner</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">10 Jan 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="alert('Lihat 1001')" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm mr-1">Lihat</button>
                        <button onclick="alert('Edit 1001')" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm mr-1">Edit</button>
                        <button onclick="if(confirm('Hapus 1001?')) alert('Dihapus')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm">Hapus</button>
                    </td>
                </tr>
                {{-- Tambah data pengguna lain disini --}}
            </tbody>
        </table>
    </div>
</div>
@endsection