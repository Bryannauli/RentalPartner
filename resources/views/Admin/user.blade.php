@extends('admin.layout')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-slate-800">Manajemen Pengguna</h2>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </a>
    </div>

    <form action="{{ route('admin.users') }}" method="GET">
        <div class="flex gap-4 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pengguna..." class="flex-grow p-2 border rounded-md">
            <select name="status" class="p-2 border rounded-md">
                <option>Semua Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Ditangguhkan</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

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
                    @if ($user->access_level == 2)
                    <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                        Owner
                    </span>
                    @elseif ($user->status == 'active')
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
                        @if ($user->status === 'suspended')
                            <form action="{{ route('admin.users.activate', $user->id) }}" method="POST" onsubmit="return confirm('Aktifkan kembali pengguna ini?');">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm font-bold py-1 px-3 rounded">Aktifkan</button>
                            </form>
                        @else
                            <form action="{{ route('admin.users.suspend', $user->id) }}" method="POST" onsubmit="return confirm('Anda yakin menangguhkan pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Tangguhkan</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection