@extends('admin.layout')

@section('title', 'Detail Permintaan Owner')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-md h-fit">
        <div class="flex flex-col items-center text-center">
            <img class="w-24 h-24 rounded-full mb-4 object-cover" src="https://i.pravatar.cc/150?u=budi.santoso" alt="User Avatar">
            <h3 class="text-xl font-bold text-slate-800">Budi Santoso</h3>
            <p class="text-slate-500">budi.santoso@email.com</p>
            <p class="text-slate-500 mt-1">+62812-3456-7890</p>
            <span class="mt-4 px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full">Pending Verification</span>
        </div>
        <div class="mt-6 border-t pt-4">
            <h4 class="font-bold text-slate-700 mb-2">Alamat</h4>
            <p class="text-sm text-slate-600">Jl. Pahlawan No. 123, Jakarta, Indonesia</p>
        </div>
    </div>

    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-slate-800 mb-4">Dokumen Verifikasi</h3>
        <div class="space-y-6">
            <div>
                <h4 class="font-semibold text-slate-700 mb-2">Kartu Tanda Penduduk (KTP)</h4>
                <div class="border rounded-lg p-2">
                    <img src="https://placehold.co/600x400/e2e8f0/475569?text=Gambar+KTP" alt="Foto KTP" class="w-full h-auto rounded-md">
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-slate-700 mb-2">Surat Izin Mengemudi (SIM)</h4>
                <div class="border rounded-lg p-2">
                    <img src="https://placehold.co/600x400/e2e8f0/475569?text=Gambar+SIM" alt="Foto SIM" class="w-full h-auto rounded-md">
                </div>
            </div>
            <div>
                <h4 class="font-semibold text-slate-700 mb-2">Surat Tanda Nomor Kendaraan (STNK)</h4>
                <div class="border rounded-lg p-2">
                    <img src="https://placehold.co/600x400/e2e8f0/475569?text=Gambar+STNK" alt="Foto STNK" class="w-full h-auto rounded-md">
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t flex justify-end gap-4">
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded">Tolak</button>
            </form>
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded">Setujui & Upgrade Akun</button>
            </form>
        </div>
    </div>
</div>
@endsection