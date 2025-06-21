@extends('layouts.app')

@section('title', 'Edit Profil')
<script src="https://cdn.tailwindcss.com"></script>
@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded mt-28 mb-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Edit Profil</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Password Baru</label>
            <input type="password" name="password" class="w-full p-2 border rounded" placeholder="Kosongkan jika tidak ingin mengubah">
        </div>

        <div class="mb-6">
            <label class="block font-medium mb-1">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" placeholder="Kosongkan jika tidak ingin mengubah" class="w-full p-2 border rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mr-50">Simpan</button>
    </form>
</div>
@endsection