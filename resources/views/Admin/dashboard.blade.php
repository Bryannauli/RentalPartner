@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-users"></i></div>
            <div>
                <h3 class="text-2xl font-bold">2,456</h3>
                <p class="text-slate-500">Total Pengguna</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
            <div class="w-12 h-12 bg-green-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-user-tie"></i></div>
            <div>
                <h3 class="text-2xl font-bold">358</h3>
                <p class="text-slate-500">Total Owner</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
            <div class="w-12 h-12 bg-yellow-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-car"></i></div>
            <div>
                <h3 class="text-2xl font-bold">1,245</h3>
                <p class="text-slate-500">Postingan Aktif</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
            <div class="w-12 h-12 bg-red-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-clock"></i></div>
            <div>
                <h3 class="text-2xl font-bold">28</h3>
                <p class="text-slate-500">Permintaan Pending</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-slate-800">Permintaan Owner Terbaru</h2>
            <a href="#" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 font-semibold text-slate-600">Nama</th>
                        <th class="p-3 font-semibold text-slate-600">Email</th>
                        <th class="p-3 font-semibold text-slate-600">Tanggal</th>
                        <th class="p-3 font-semibold text-slate-600">Status</th>
                        <th class="p-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-3">Budi Santoso</td>
                        <td class="p-3">budi.santoso@email.com</td>
                        <td class="p-3">15 Mei 2025</td>
                        <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending</span></td>
                        <td class="p-3">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        </td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </div>
@endsection