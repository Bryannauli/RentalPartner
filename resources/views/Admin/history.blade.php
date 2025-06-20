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
                    <th class="p-3 font-semibold text-slate-600">Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                <tr class="border-b">
                    <td class="p-3">#TRX-{{ str_pad($pesanan->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td class="p-3">{{ $pesanan->user->name ?? '-' }}</td>
                    <td class="p-3">{{ $pesanan->postingan->judul ?? '-' }}</td>
                    <td class="p-3">
                        {{ \Carbon\Carbon::parse($pesanan->start_date)->format('d M Y') }}
                        -
                        {{ \Carbon\Carbon::parse($pesanan->end_date)->format('d M Y') }}
                    </td>
                    <td class="p-3">Rp {{ number_format($pesanan->postingan->harga * \Carbon\Carbon::parse($pesanan->start_date)->diffInDays($pesanan->end_date), 0, ',', '.') }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                            {{ $pesanan->status == 'Selesai' ? 'bg-green-500 text-white' : 'bg-yellow-400 text-black' }}">
                            {{ $pesanan->status }}
                        </span>
                    </td>
                    <td class="p-3">
                        <img src="{{ asset('storage/' . $pesanan->payment_proof) }}" alt=" " class="w-24 h-16 object-cover rounded">
                    </td>
                </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection