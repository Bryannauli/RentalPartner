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
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3">Toyota Avanza 2023</td>
                    <td class="p-3">Siti Nurhayati</td>
                    <td class="p-3 text-yellow-500"><i class="fas fa-star"></i> 4.5</td>
                    <td class="p-3 max-w-xs truncate">Mobilnya bersih dan nyaman, pemilik ramah.</td>
                    <td class="p-3">16 Mei 2025</td>
                    <td class="p-3 flex gap-2">
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Lihat</a>
                        <form action="#" method="POST" onsubmit="return confirm('Sembunyikan ulasan ini?');">
                            @csrf
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold py-1 px-3 rounded">Sembunyikan</button>
                        </form>
                    </td>
                </tr>
                </tbody>
        </table>
    </div>
</div>
@endsection