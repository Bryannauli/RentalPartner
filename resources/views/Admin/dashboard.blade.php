@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
{{-- Bagian Statistik Atas --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <div class="w-12 h-12 bg-blue-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-users"></i></div>
        <div>
            <h3 class="text-2xl font-bold">{{$totalUsers}}</h3>
            <p class="text-slate-500">Total Pengguna</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <div class="w-12 h-12 bg-green-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-user-tie"></i></div>
        <div>
            <h3 class="text-2xl font-bold">{{$totalOwners}}</h3>
            <p class="text-slate-500">Total Owner</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <div class="w-12 h-12 bg-yellow-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-car"></i></div>
        <div>
            <h3 class="text-2xl font-bold">{{$totalPosts}}</h3>
            <p class="text-slate-500">Postingan Aktif</p>
        </div>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
        <div class="w-12 h-12 bg-red-500 text-white rounded-lg flex items-center justify-center text-xl"><i class="fas fa-clock"></i></div>
        <div>
            <h3 class="text-2xl font-bold">{{$pendingRequests}}</h3>
            <p class="text-slate-500">Permintaan Pending</p>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-slate-800">Permintaan Owner Terbaru</h2>
        <a href="{{ route('admin.owner-requests')}}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
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
                @foreach ($recentOwners as $owner)
                <tr class="border-b">
                    <td class="p-3">{{ $owner->user->name }}</td>
                    <td class="p-3">{{ $owner->user->email }}</td>
                    <td class="p-3">{{ $owner->created_at->format('d M Y') }}</td>
                    <td class="p-3">
                        @if ($owner->status_verifikasi == 'pending')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                        @elseif ($owner->status_verifikasi == 'approved')
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                        @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                        @endif
                    </td>
                    <td class="p-3">
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

{{-- Baris Baru untuk Tabel-Tabel Tambahan --}}
<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-slate-800">Pengguna Terbaru</h2>
        <a href="{{ route('admin.users') }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-3 font-semibold text-slate-600">Nama</th>
                    <th class="p-3 font-semibold text-slate-600">Email</th>
                    <th class="p-3 font-semibold text-slate-600">Bergabung</th>
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latestUser as $user)
                <tr class="border-b">
                    <td class="p-3">{{ $user->name }}</td>
                    <td class="p-3">{{ $user->email }}</td>
                    <td class="p-3">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.users', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    {{-- Tabel Owner Terbaru (yang sudah disetujui) --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-slate-800">Owner Terbaru</h2>
            <a href="{{ route('admin.owner') }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 font-semibold text-slate-600">Nama</th>
                        <th class="p-3 font-semibold text-slate-600">Email</th>
                        <th class="p-3 font-semibold text-slate-600">Disetujui</th>
                        <th class="p-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestApprovedOwners as $owner)
                    <tr class="border-b">
                        <td class="p-3">{{ $owner->user->name }}</td>
                        <td class="p-3">{{ $owner->user->email }}</td>
                        <td class="p-3">{{ $owner->updated_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <a href="{{ route('admin.owner.detail', $owner->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    {{-- Tabel Postingan Mobil Terbaru --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-slate-800">Postingan Mobil Terbaru</h2>
            <a href="{{ route('admin.posts') }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 font-semibold text-slate-600">Mobil</th>
                        <th class="p-3 font-semibold text-slate-600">Owner</th>
                        <th class="p-3 font-semibold text-slate-600">Tanggal Post</th>
                        <th class="p-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestPosts as $post)
                    <tr class="border-b">
                        <td class="p-3">{{ $post->brand }} {{ $post->type }}</td>
                        <td class="p-3">{{ $post->owner->user->name }}</td>
                        <td class="p-3">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<div class="bg-white p-6 rounded-lg shadow-md mb-6">
    {{-- Tabel Review Terbaru --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-slate-800">Review Terbaru</h2>
            <a href="{{ route('admin.review') }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 font-semibold text-slate-600">Pengguna</th>
                        <th class="p-3 font-semibold text-slate-600">Mobil</th>
                        <th class="p-3 font-semibold text-slate-600">Rating</th>
                        <th class="p-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestReviews as $review)
                    <tr class="border-b">
                        <td class="p-3">{{ $review->user->name }}</td>
                        <td class="p-3">{{ $review->brand }}</td>
                        <td class="p-3 text-yellow-500">
                            @for ($i = 0; $i < $review->rating; $i++) <i class="fas fa-star"></i> @endfor
                                {{ $review->rating }}/5</td>
                        <td class="p-3">
                            <a href="{{ route('admin.review', $review->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabel History Pemesanan Terbaru --}}
    <div class="bg-white p-6 rounded-lg shadow-md col-span-1 lg:col-span-2">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-slate-800">History Pemesanan Terbaru</h2>
            <a href="{{ route('admin.history') }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="p-3 font-semibold text-slate-600">Penyewa</th>
                        <th class="p-3 font-semibold text-slate-600">Mobil</th>
                        <th class="p-3 font-semibold text-slate-600">Tanggal Mulai</th>
                        <th class="p-3 font-semibold text-slate-600">Status</th>
                        <th class="p-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestBookings as $booking)
                    <tr class="border-b">
                        <td class="p-3">{{ $booking->user->name }}</td>
                        <td class="p-3">{{ $booking->car_name }} {{ $booking->typel }}</td>
                        <td class="p-3">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</td>
                        <td class="p-3">
                            <span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">{{ ucfirst($booking->status) }}</span>
                        </td>
                        <td class="p-3">
                            <a href="{{ route('admin.history', $booking->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection