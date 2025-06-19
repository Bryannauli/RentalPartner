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
                    <th class="p-3 font-semibold text-slate-600">No hp</th>
                    <th class="p-3 font-semibold text-slate-600">Status</th>
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-b">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">{{ $user->phone }}</td>
                <td class="p-3">
                    @if ($user->role == 'owner')
                    <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                        Owner
                    </span>
                    @elseif ($user->is_active)
                        <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                    Aktif
                    </span>
                    @else
                    <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                        Ditangguhkan
                    </span>
                    @endif
                </td>
                    <td class="p-3 flex gap-2">
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Anda yakin menangguhkan pengguna ini?');">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Tangguhkan</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection