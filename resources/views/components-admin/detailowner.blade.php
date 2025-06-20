@extends('admin.layout')

@section('title', 'Detail Permintaan Owner')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-md h-fit">
        <div class="flex flex-col items-center text-center">
            {{-- pakai foto profil kalau ada, kalau nggak fallback --}}
            <img class="w-24 h-24 rounded-full mb-4 object-cover"
                src="{{ $owner->user->photo ? asset('storage/photos/' . $owner->user->photo) : 'https://i.pravatar.cc/150?u=' . urlencode($owner->user->email) }}"
                alt="User Avatar">

            <h3 class="text-xl font-bold text-slate-800">{{ $owner->user->name }}</h3>
            <p class="text-slate-500">{{ $owner->user->email }}</p>
            <p class="text-slate-500 mt-1">{{ $owner->phone }}</p>
            <span class="mt-4 px-3 py-1 text-sm font-semibold 
                @if($owner->status_verifikasi == 'pending') text-yellow-800 bg-yellow-200
                @elseif($owner->status_verifikasi == 'approved') text-green-800 bg-green-200
                @elseif($owner->status_verifikasi == 'rejected') text-red-800 bg-red-200
                @else text-gray-800 bg-gray-200
                @endif rounded-full">
                {{ ucfirst($owner->status_verifikasi) }}
            </span>
        </div>
        <div class="mt-6 border-t pt-4">
            <h4 class="font-bold text-slate-700 mb-2">NIK</h4>
            <p class="text-sm text-slate-600">{{ $owner->nik }}</p>
        </div>
        <div class="mt-6 border-t pt-4">
            <h4 class="font-bold text-slate-700 mb-2">Alamat</h4>
            <p class="text-sm text-slate-600">{{ $owner->address }}</p>
        </div>
    </div>

    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-slate-800 mb-4">Dokumen Verifikasi</h3>
        <div class="space-y-6">
            <div>
                <h4 class="font-semibold text-slate-700 mb-2">Kartu Tanda Penduduk (KTP)</h4>
                <div class="border rounded-lg p-2">
                    <img src="{{ asset('storage/' . $owner->ktp) }}" alt="Foto KTP" class="w-full h-auto rounded-md">
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-slate-700 mb-2">Surat Izin Mengemudi (SIM)</h4>
                <div class="border rounded-lg p-2">
                    <img src="{{ asset('storage/' . $owner->sim) }}" alt="Foto SIM" class="w-full h-auto rounded-md">
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-slate-700 mb-2">Surat Tanda Nomor Kendaraan (STNK)</h4>
                <div class="border rounded-lg p-2">
                    <img src="{{ asset('storage/' . $owner->stnk) }}" alt="Foto STNK" class="w-full h-auto rounded-md">
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t flex justify-end gap-4">
            <a href="{{ route('admin.owner-requests') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection