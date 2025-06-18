@extends('admin.layout')

@section('title', 'Detail Mobil')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <img src="https://placehold.co/600x400/e2e8f0/475569?text=Pajero+Sport" alt="Mitsubishi Pajero Sport" class="w-full h-auto rounded-lg shadow-md">
        </div>
        
        <div>
            <h2 class="text-3xl font-bold text-slate-800">Mitsubishi Pajero Sport</h2>
            <p class="text-lg text-slate-500 mb-6">Tipe Dakar 4x2</p>
            
            <div class="grid grid-cols-2 gap-4 text-slate-700">
                <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Merek</div>
                    <div class="text-md font-bold">Mitsubishi</div>
                </div>
                 <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Model</div>
                    <div class="text-md font-bold">Pajero Sport</div>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Tahun</div>
                    <div class="text-md font-bold">2024</div>
                </div>
                <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Tipe Body</div>
                    <div class="text-md font-bold">SUV</div>
                </div>
                 <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Transmisi</div>
                    <div class="text-md font-bold">Otomatis</div>
                </div>
                 <div class="bg-slate-50 p-3 rounded-lg">
                    <div class="text-sm font-semibold text-slate-500">Kapasitas Mesin</div>
                    <div class="text-md font-bold">2442cc</div>
                </div>
            </div>
            
             <div class="mt-8 flex gap-4">
                <a href="#" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-4 rounded text-center">Edit Data</a>
                <a href="{{-- route('admin.cars.index') --}}" class="flex-1 bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-3 px-4 rounded text-center">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection