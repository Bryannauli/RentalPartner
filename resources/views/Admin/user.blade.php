@extends('admin.layout')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-slate-800">Manajemen Pengguna</h2>
        <a href="{{-- route('admin.users.create') --}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </a>
    </div>

    <div class="flex gap-4 mb-4">
        <input type="text" placeholder="Cari pengguna..." class="flex-grow p-2 border rounded-md">
        <select class="p-2 border rounded-md">
            <option>Semua Tipe</option>
            <option>Pengguna</option>
            <option>Owner</option>
        </select>
        <select class="p-2 border rounded-md">
            <option>Semua Status</option>
            <option>Aktif</option>
            <option>Ditangguhkan</option>
        </select>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-3 font-semibold text-slate-600">Nama</th>
                    <th class="p-3 font-semibold text-slate-600">Email</th>
                    <th class="p-3 font-semibold text-slate-600">Tipe Akun</th>
                    <th class="p-3 font-semibold text-slate-600">Status</th>
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3">Budi Santoso</td>
                    <td class="p-3">budi.santoso@email.com</td>
                    <td class="p-3">Owner</td>
                    <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Aktif</span></td>
                    <td class="p-3 flex gap-2">
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold py-1 px-3 rounded">Edit</a>
                        <form action="#" method="POST" onsubmit="return confirm('Anda yakin?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                </tbody>
        </table>
    </div>
</div>
@endsection