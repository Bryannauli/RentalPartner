@extends('admin.layout')

@section('title', 'Detail Permintaan Owner')
@section('page-title', 'Detail Permintaan Owner')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Data Owner</h2>
    <p><strong>Nama:</strong> {{ $owner->user->name }}</p>
    <p><strong>Email:</strong> {{ $owner->user->email }}</p>
    <p><strong>NIK:</strong> {{ $owner->nik }}</p>
    <p><strong>No HP:</strong> {{ $owner->phone }}</p>
    <p><strong>Alamat:</strong> {{ $owner->address }}</p>
    <p><strong>KTP:</strong><br> <img src="{{ asset('storage/' . $owner->ktp) }}" class="w-40 mt-2"></p>
    <p><strong>SIM:</strong><br> <img src="{{ asset('storage/' . $owner->sim) }}" class="w-40 mt-2"></p>
    <p><strong>STNK:</strong><br> <img src="{{ asset('storage/' . $owner->stnk) }}" class="w-40 mt-2"></p>

    <div class="mt-6">
        <a href="{{ route('admin.owner-requests') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>
</div>
@endsection
