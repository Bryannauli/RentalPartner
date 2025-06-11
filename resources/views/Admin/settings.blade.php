@extends('admin.layout')

@section('title', 'Pengaturan - Rental Partner Admin')

@section('page-title', 'Pengaturan')

@section('content')
<div class="bg-white rounded-lg shadow p-5 space-y-6">
    <form action="#" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="app_name" class="block font-semibold mb-1">Nama Aplikasi</label>
            <input id="app_name" name="app_name" type="text" value="Rental Partner" class="border border-gray-300 rounded px-3 py-2 w-full" />
        </div>
        <div>
            <label for="admin_email" class="block font-semibold mb-1">Email Admin</label>
            <input id="admin_email" name="admin_email" type="email" value="admin@rentalpartner.id" class="border border-gray-300 rounded px-3 py-2 w-full" />
        </div>
        <div>
            <label for="email_notifications" class="block font-semibold mb-1">Notifikasi Email</label>
            <select id="email_notifications" name="email_notifications" class="border border-gray-300 rounded px-3 py-2 w-full">
                <option value="enabled">Aktif</option>
                <option value="disabled">Tidak Aktif</option>
            </select>
        </div>
        <div>
            <label for="commission_percentage" class="block font-semibold mb-1">Persentase Komisi</label>
            <input id="commission_percentage" name="commission_percentage" type="number" value="5" class="border border-gray-300 rounded px-3 py-2 w-full" />
        </div>
        <div>
            <label for="max_images_post" class="block font-semibold mb-1">Maksimum Gambar per Postingan</label>
            <input id="max_images_post" name="max_images_post" type="number" value="10" class="border border-gray-300 rounded px-3 py-2 w-full" />
        </div>
        <div>
            <label for="user_verification" class="block font-semibold mb-1">Verifikasi Pengguna Baru</label>
            <select id="user_verification" name="user_verification" class="border border-gray-300 rounded px-3 py-2 w-full">
                <option value="auto">Otomatis</option>
                <option value="manual">Manual</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Simpan Pengaturan</button>
    </form>

    <section class="border-t pt-6">
        <h3 class="text-xl font-semibold mb-4">Maintenance Mode</h3>
        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label for="maintenance_status" class="block font-semibold mb-1">Status Maintenance</label>
                <select id="maintenance_status" name="maintenance_status" class="border border-gray-300 rounded px-3 py-2 w-full">
                    <option value="disabled">Tidak Aktif</option>
                    <option value="enabled">Aktif</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="maintenance_message" class="block font-semibold mb-1">Pesan Maintenance</label>
                <textarea id="maintenance_message" name="maintenance_message" rows="3" class="border border-gray-300 rounded px-3 py-2 w-full">Sistem sedang dalam pemeliharaan. Silakan coba beberapa saat lagi.</textarea>
            </div>
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="maintenance_start" class="block font-semibold mb-1">Waktu Mulai</label>
                    <input id="maintenance_start" name="maintenance_start" type="datetime-local" class="border border-gray-300 rounded px-3 py-2 w-full" />
                </div>
                <div>
                    <label for="maintenance_end" class="block font-semibold mb-1">Waktu Selesai</label>
                    <input id="maintenance_end" name="maintenance_end" type="datetime-local" class="border border-gray-300 rounded px-3 py-2 w-full" />
                </div>
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition">Aktifkan Maintenance Mode</button>
        </form>
    </section>
</div>
@endsection