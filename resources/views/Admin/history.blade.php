@extends('admin.layout')

@section('title', 'Riwayat Transaksi')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-slate-800 mb-4">Riwayat Transaksi Pengguna</h2>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-3 font-semibold text-slate-600">ID Transaksi</th>
                    <th class="p-3 font-semibold text-slate-600">Pengguna</th>
                    <th class="p-3 font-semibold text-slate-600">Mobil</th>
                    <th class="p-3 font-semibold text-slate-600">Tanggal Sewa</th>
                    <th class="p-3 font-semibold text-slate-600">Total Harga</th>
                    <th class="p-3 font-semibold text-slate-600">Status</th>
                    <th class="p-3 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3">#TRX-00123</td>
                    <td class="p-3">Rudi Hartono</td>
                    <td class="p-3">Honda Brio 2022</td>
                    <td class="p-3">20 Mei 2025 - 22 Mei 2025</td>
                    <td class="p-3">Rp 600.000</td>
                    <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Selesai</span></td>
                    <td class="p-3">
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Detail</a>
                    </td>
                </tr>
                 <tr class="border-b">
                    <td class="p-3">#TRX-00124</td>
                    <td class="p-3">Dewi Lestari</td>
                    <td class="p-3">Mitsubishi Xpander 2023</td>
                    <td class="p-3">18 Mei 2025 - 19 Mei 2025</td>
                    <td class="p-3">Rp 450.000</td>
                    <td class="p-3"><span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-200 rounded-full">Dibatalkan</span></td>
                    <td class="p-3">
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-1 px-3 rounded">Detail</a>
                    </td>
                </tr>
                </tbody>
        </table>
    </div>
</div>
@endsection