@extends('admin.layout')

@section('title', 'Ulasan (Reviews)')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-slate-800 mb-4">Manajemen Ulasan</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-3 font-semibold text-slate-600">Mobil</th>
                    <th class="p-3 font-semibold text-slate-600">Pengguna</th>
                    <th class="p-3 font-semibold text-slate-600">Rating</th>
                    <th class="p-3 font-semibold text-slate-600">Ulasan</th>
                    <th class="p-3 font-semibold text-slate-600">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                <tr class="border-b">
                    <td class="p-3">{{ $review->post->car_name ?? '-' }}</td>
                    <td class="p-3">{{ $review->user->name ?? 'User' }}</td>
                    <td class="p-3 text-yellow-500"><i class="fas fa-star"></i> {{ $review->rating }}</td>
                    <td class="p-3 max-w-xs truncate">{{ $review->comment }}</td>
                    <td class="p-3">{{ $review->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-3 text-center text-gray-500">Belum ada ulasan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection