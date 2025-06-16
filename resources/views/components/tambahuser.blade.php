@extends('layouts.admin')

@section('title', 'Tambah Pengguna Baru')

@section('content')
<div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-slate-800 mb-6">Formulir Pengguna Baru</h2>
    
    <form action="{{-- route('admin.users.store') --}}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="col-span-2">
                <label for="email" class="block text-sm font-medium text-slate-700">Alamat Email</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-slate-700">Tipe Akun</label>
                <select id="role" name="role" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="user">Pengguna Biasa</option>
                    <option value="owner">Owner</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status Akun</label>
                <select id="status" name="status" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                    <option value="suspended">Ditangguhkan</option>
                </select>
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <a href="{{-- route('admin.users.index') --}}" class="bg-slate-200 hover:bg-slate-300 text-slate-800 font-bold py-2 px-4 rounded">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Simpan Pengguna
            </button>
        </div>
    </form>
</div>
@endsection