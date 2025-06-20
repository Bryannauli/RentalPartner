@extends('admin.layout')

@section('title', 'Data Mobil')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-4">
        <h2 class="text-xl font-bold text-slate-800">Daftar Mobil</h2>
    </div>

    <form action="{{ route('admin.mobil') }}" method="GET">
        <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan merek atau model..." class="flex-grow p-2 border rounded-md">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-3 font-semibold text-slate-600">Mobil (Merek & Model)</th>
                    <th class="p-3 font-semibold text-slate-600">Tipe</th>
                    <th class="p-3 font-semibold text-slate-600">Transmisi</th>
                    <th class="p-3 font-semibold text-slate-600">Tahun</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mobil as $m)
                <tr class="border-b hover:bg-slate-50 transition-colors">
                    <td class="p-3">
                        <div class="flex items-center gap-3">
                            <img src="{{ $m->photo ? asset('storage/' . $m->photo) : 'https://placehold.co/100x60/e2e8f0/475569?text=No+Image' }}" 
                                alt="Car" class="w-20 h-12 object-cover rounded-md">
                            <div>
                                <div class="font-bold">{{ $m->brand }} {{ $m->car_name }}</div>
                                <div class="text-sm text-slate-500">{{ $m->id }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-3">{{ $m->type }}</td>
                    <td class="p-3">{{ $m->transmission }}</td>
                    <td class="p-3">{{ $m->year }}</td>
                    </td>
                </tr> 
                @endforeach
                </tbody>
        </table>
    </div>

    <!-- <div class="flex justify-center mt-6">
        <nav class="flex items-center gap-2">
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">&laquo;</a>
            <a href="#" class="px-3 py-2 bg-blue-500 text-white rounded-md">1</a>
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">2</a>
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">3</a>
            <a href="#" class="px-3 py-2 bg-slate-200 text-slate-700 rounded-md hover:bg-slate-300">&raquo;</a>
        </nav>
    </div> -->
</div>
@endsection