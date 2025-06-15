@extends('layouts.admin')

@section('title', 'Data Mobil')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-4">
        <h2 class="text-xl font-bold text-slate-800">Manajemen Master Mobil</h2>
        <a href="{{-- route('admin.cars.create') --}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2 w-full md:w-auto">
            <i class="fas fa-plus"></i> Tambah Mobil Baru
        </a>
    </div>

    <div class="mb-4">
        <div class="relative">
            <input type="text" placeholder="Cari berdasarkan merek atau model..." class="w-full p-2 pl-10 border rounded-md">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-3 font-semibold text-slate-600">Mobil (Merek & Model)</th>
                    <th class="p-3 font-semibold text-slate-600">Tipe</th>
                    <th class="p-3 font-semibold text-slate-600">Transmisi</th>
                    <th class="p-3 font-semibold text-slate-600">Tahun</th>
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-slate-50 transition-colors">
                    <td class="p-3">
                        <div class="flex items-center gap-3">
                            <img src="https://placehold.co/100x60/e2e8f0/475569?text=Avanza" alt="Car" class="w-20 h-12 object-cover rounded-md">
                            <div>
                                <div class="font-bold">Toyota Avanza</div>
                                <div class="text-sm text-slate-500">ID: 1</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-3">MPV</td>
                    <td class="p-3">Manual</td>
                    <td class="p-3">2023</td>
                    <td class="p-3 flex gap-2">
                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold py-1 px-3 rounded">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data mobil ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                <tr class="border-b hover:bg-slate-50 transition-colors">
                    <td class="p-3">
                        <div class="flex items-center gap-3">
                            <img src="https://placehold.co/100x60/e2e8f0/475569?text=Pajero" alt="Car" class="w-20 h-12 object-cover rounded-md">
                            <div>
                                <div class="font-bold">Mitsubishi Pajero Sport</div>
                                <div class="text-sm text-slate-500">ID: 2</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-3">SUV</td>
                    <td class="p-3">Otomatis</td>
                    <td class="p-3">2024</td>
                    <td class="p-3 flex gap-2">
                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold py-1 px-3 rounded">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data mobil ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                <tr class="border-b hover:bg-slate-50 transition-colors">
                    <td class="p-3">
                        <div class="flex items-center gap-3">
                            <img src="https://placehold.co/100x60/e2e8f0/475569?text=Brio" alt="Car" class="w-20 h-12 object-cover rounded-md">
                            <div>
                                <div class="font-bold">Honda Brio Satya</div>
                                <div class="text-sm text-slate-500">ID: 3</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-3">Hatchback</td>
                    <td class="p-3">Manual</td>
                    <td class="p-3">2022</td>
                    <td class="p-3 flex gap-2">
                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold py-1 px-3 rounded">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data mobil ini secara permanen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                </tbody>
        </table>
    </div>

    <div class="flex justify-center mt-6">
        <nav class="flex items-center gap-2">
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">&laquo;</a>
            <a href="#" class="px-3 py-2 bg-blue-500 text-white rounded-md">1</a>
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">2</a>
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">3</a>
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">&raquo;</a>
        </nav>
    </div>
</div>
@endsection