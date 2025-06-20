@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
  <h2 class="text-2xl font-bold mb-4">Edit Profil</h2>

  @if (session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
  @endif

  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
      <label class="block mb-1">Nama</label>
      <input type="text" name="name" value="{{ $user->name }}" class="w-full border p-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Email</label>
      <input type="email" name="email" value="{{ $user->email }}" class="w-full border p-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Foto Profil</label>
      <input type="file" name="photo" class="w-full border p-2 rounded">
      @if($user->photo)
        <img src="{{ asset('storage/photos/' . $user->photo) }}" alt="Profile Photo" class="mt-2 w-24 h-24 rounded-full">
      @endif
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Perubahan</button>
  </form>
</div>
@endsection
