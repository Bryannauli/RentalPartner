@extends('admin.layout')

@section('title', 'Postingan Mobil - Rental Partner Admin')

@section('page-title', 'Postingan Mobil')

@section('content')
<div class="bg-white rounded-lg shadow p-5">
    <div class="mb-4 flex flex-wrap gap-4">
        <input type="text" placeholder="Cari postingan..." class="px-3 py-2 border border-gray-300 rounded flex-grow max-w-xs" />
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobil</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga/Hari</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Upload</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Update</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
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
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{$statusColors[$post->status] ?? 'bg-gray-100 text-gray-800'}}">
                            {{ucfirst($post->status)}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-1">
                        <a href="{{ route('admin.posts.show', $post->id) }}" 
                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">
                        Lihat
                        </a>

                        <form action="{{ route('admin.posts.approve', $post->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm"
                                onclick="return confirm('Setujui postingan {{ $post->id }}?')">
                                Setujui
                            </button>
                        </form>

                        <form action="{{ route('admin.posts.reject', $post->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm"
                                onclick="return confirm('Tolak postingan {{ $post->id }}?')">
                                Tolak
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection