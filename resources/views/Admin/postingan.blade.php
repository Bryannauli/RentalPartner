@extends('admin.layout')

@section('title', 'Postingan Mobil - Rental Partner Admin')

@section('page-title', 'Postingan Mobil')

@section('content')
<div class="bg-white rounded-lg shadow p-5">

    <form action="{{ route('admin.posts') }}" method="GET">
        <div class="flex gap-4 mb-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari postingan..." class="flex-grow p-2 border rounded-md">
            <select name="status" class="p-2 border rounded-md">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobil</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga/Hari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Upload</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Update</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Postingan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->car_name }} {{ $post->year }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->owner->user->name ?? 'Unknown' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($post->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $post->updated_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                        $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'approved' => 'bg-green-100 text-green-800',
                        'rejected' => 'bg-red-100 text-red-800',
                        ];
                        @endphp
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{$statusColors[$post->status_verifikasi] ?? 'bg-gray-100 text-gray-800'}}">
                            {{ucfirst($post->status_verifikasi)}}
                        </span>
                    </td>
                    <!-- aksi -->
                    <td class="px-6 py-4 whitespace-nowrap space-x-1">
                        <a href="{{ route('admin.posts.show', $post->id) }}"
                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm inline-block">
                            Lihat
                        </a>

                        @if ($post->status_verifikasi == 'pending')
                        <form action="{{ route('admin.posts.approve', $post->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm"
                                onclick="return confirm('Setujui postingan {{ $post->id }}?')">
                                Setujui
                            </button>
                        </form>
                        
                        <a href="{{ route('admin.posts.showRejectForm', $post->id) }}"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm inline-block">
                            Tolak
                        </a>

                        @elseif($post->status_verifikasi == 'approved')
                        <span class="bg-green-300 text-green-900 px-3 py-1 rounded text-sm cursor-not-allowed">Sudah</span>
                        @elseif($post->status_verifikasi == 'rejected')
                        <span class="bg-red-300 text-red-900 px-3 py-1 rounded text-sm cursor-not-allowed">Ditolak</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection