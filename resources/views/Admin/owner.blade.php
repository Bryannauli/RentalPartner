@extends('admin.layout')

@section('title', 'Permintaan Owner - Rental Partner Admin')

@section('page-title', 'Permintaan Owner')

@section('content')

<div class="bg-white rounded-lg shadow p-5">

    <form action="{{ route('admin.owner-requests') }}" method="GET">
        <div class="flex gap-4 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari permintaan..." class="flex-grow p-2 border rounded-md">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <i class="fas fa-search"></i> Cari
            </button>
            <select name="status" class="p-2 border rounded-md">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
    </form>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Permintaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Permintaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($owners as $owner)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $owner->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $owner->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $owner->user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $owner->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $owner->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($owner->status_verifikasi == 'pending')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif ($owner->status_verifikasi == 'approved')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                        @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-1">
                        @if ($owner->status_verifikasi == 'pending')
                        <form action="{{ route('admin.owner.approve', $owner->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm">
                                Setujui
                            </button>
                        </form>
                        <form action="{{ route('admin.owner.reject', $owner->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm">
                                Tolak
                            </button>
                        </form>
                        @endif
                        <a href="{{ route('admin.owner.detail', $owner->id) }}"
                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">
                            Lihat
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="request-modal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="modal-content bg-white rounded-lg p-6 w-11/12 max-w-lg">
        <h3 class="text-lg font-semibold mb-4">Detail Pengajuan</h3>
        <div id="modal-body">
            <!-- Konten detail pengajuan akan dimasukkan di sini -->
        </div>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Tutup</button>
        </div>
    </div>
</div>

@endsection