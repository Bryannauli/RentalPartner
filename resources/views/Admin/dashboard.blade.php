@extends('admin.layout')

@section('title', 'Dashboard - Rental Partner Admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <article class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-blue-600 text-white text-xl">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <h3 class="text-2xl font-bold">2,456</h3>
            <p class="text-gray-500">Total Pengguna</p>
        </div>
    </article>

    <article class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-green-600 text-white text-xl">
            <i class="fas fa-user-tie"></i>
        </div>
        <div>
            <h3 class="text-2xl font-bold">358</h3>
            <p class="text-gray-500">Total Owner</p>
        </div>
    </article>

    <article class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-yellow-500 text-white text-xl">
            <i class="fas fa-car"></i>
        </div>
        <div>
            <h3 class="text-2xl font-bold">1,245</h3>
            <p class="text-gray-500">Postingan Aktif</p>
        </div>
    </article>

    <article class="bg-white rounded-lg shadow p-6 flex items-center gap-4">
        <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-red-600 text-white text-xl">
            <i class="fas fa-clock"></i>
        </div>
        <div>
            <h3 class="text-2xl font-bold">28</h3>
            <p class="text-gray-500">Permintaan Pending</p>
        </div>
    </article>
</div>

<div class="bg-white rounded-lg shadow p-5 mb-8">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Permintaan Owner Terbaru</h3>
        <a href="{{ route('admin.owner-requests') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Permintaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Budi Santoso</td>
                    <td class="px-6 py-4 whitespace-nowrap">budi.santoso@email.com</td>
                    <td class="px-6 py-4 whitespace-nowrap">15 Mei 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">Lihat</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="bg-white rounded-lg shadow p-5">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Postingan Terbaru</h3>
        <a href="{{ route('admin.posts') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
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
                    <td class="px-6 py-4 whitespace-nowrap">Toyota Avanza 2023</td>
                    <td class="px-6 py-4 whitespace-nowrap">Budi Santoso</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp 350.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">17 Mei 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">Lihat</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection