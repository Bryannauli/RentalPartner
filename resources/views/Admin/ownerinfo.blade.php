@extends('admin.layout')

@section('title', 'Daftar Pengguna')

@section('content')
@if(session('success'))
<div class="bg-green-200 text-green-800 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-slate-800">Manajemen Owner</h2>
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
                    <th class="p-3 font-semibold text-slate-600">ID</th>
                    <th class="p-3 font-semibold text-slate-600">Nama</th>
                    <th class="p-3 font-semibold text-slate-600">Email</th>
                    <th class="p-3 font-semibold text-slate-600">No HP</th>
                    <th class="p-3 font-semibold text-slate-600">Tanggal Permintaan</th>
                    <th class="p-3 font-semibold text-slate-600">Status</th>
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                <tr class="border-b">
                    <td class="p-3">{{$owner->id}}</td>
                    <td class="p-3">{{$owner->user->name}}</td>
                    <td class="p-3">{{$owner->user->email}}</td>
                    <td class="p-3">{{ $owner->phone }}</td>
                    <td class="p-3">{{ $owner->created_at->format('d M Y') }}</td>
                    <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Aktif</span></td>
                    <td class="p-3 flex gap-2">
                        @if($owner->status === 'active')
                        <form action="{{ route('admin.suspendOwner', $owner->id) }}" method="POST" onsubmit="return confirm('Tangguhkan owner ini?');">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm font-bold py-1 px-3 rounded">Tangguhkan</button>
                        </form>
                        @elseif($owner->status === 'suspended')
                        <form action="{{ route('admin.activateOwner', $owner->id) }}" method="POST" onsubmit="return confirm('Aktifkan kembali owner ini?');">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm font-bold py-1 px-3 rounded">Aktifkan</button>
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