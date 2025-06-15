@extends('admin.layout')

@section('title', 'Review - Rental Partner Admin')

@section('page-title', 'Review')

@section('content')

<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Review Pengguna</h2>
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Rating</th>
                <th class="px-4 py-2">Komentar</th>
                <th class="px-4 py-2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-2">Rudi Hartono</td>
                <td class="px-4 py-2">⭐️⭐️⭐️⭐️</td>
                <td class="px-4 py-2">Pelayanan sangat baik dan mobil bersih.</td>
                <td class="px-4 py-2">12 Mei 2025</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection