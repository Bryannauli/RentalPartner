@extends('admin.layout')

@section('title', 'Permintaan Owner - Rental Partner Admin')

@section('page-title', 'Permintaan Owner')

@section('content')
<div class="bg-white rounded-lg shadow p-5">
    <div class="mb-4 flex flex-wrap gap-4">
        <input type="text" placeholder="Cari permintaan..." class="px-3 py-2 border border-gray-300 rounded flex-grow max-w-xs" />
        <select class="border border-gray-300 rounded px-3 py-2">
            <option value="all">Semua Status</option>
            <option value="pending">Pending</option>
            <option value="approved">Disetujui</option>
            <option value="rejected">Ditolak</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Permintaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">2001</td>
                    <td class="px-6 py-4 whitespace-nowrap">Budi Santoso</td>
                    <td class="px-6 py-4 whitespace-nowrap">budi.santoso@email.com</td>
                    <td class="px-6 py-4 whitespace-nowrap">15 Mei 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-1">
                        <button onclick="openModal(2001)" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">Lihat</button>
                        <button onclick="if(confirm('Setujui permintaan 2001?')) alert('Disetujui')" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition text-sm">Setujui</button>
                        <button onclick="if(confirm('Tolak permintaan 2001?')) alert('Ditolak')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition text-sm">Tolak</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Menampilkan Detail Pengajuan -->
<div id="request-modal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="modal-content bg-white rounded-lg p-6 w-11/12 max-w-lg">
        <h3 class="text-lg font-semibold mb-4">Detail Pengajuan</h3>
        <div id="modal-body">
            <!-- Konten detail pengajuan akan dimasukkan di sini -->
        </div>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Tutup</button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openModal(requestId) {
        // Simulasi data pengajuan
        const requestData = {
            2001: {
                name: "Budi Santoso",
                email: "budi.santoso@email.com",
                ktp: "https://placehold.co/300x200?text=KTP",
                sim: "https://placehold.co/300x200?text=SIM",
                stnk: "https://placehold.co/300x200?text=STNK"
            }
           
        };

        const data = requestData[requestId];
        if (data) {
            document.getElementById('modal-body').innerHTML = `
                <p><strong>Nama:</strong> ${data.name}</p>
                <p><strong>Email:</strong> ${data.email}</p>
                <p><strong>Foto KTP:</strong> <img src="${data.ktp}" alt="Foto KTP" class="mt-2" /></p>
                <p><strong>Foto SIM:</strong> <img src="${data.sim}" alt="Foto SIM" class="mt-2" /></p>
                <p><strong>Foto STNK:</strong> <img src="${data.stnk}" alt="Foto STNK" class="mt-2" /></p>
            `;
            document.getElementById('request-modal').classList.remove('hidden');
        }
    }

    function closeModal() {
        document.getElementById('request-modal').classList.add('hidden');
    }
</script>
@endpush