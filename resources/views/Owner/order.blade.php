@extends('layouts.app')

@section('title', 'Pesanan Masuk')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Pesanan Masuk</h1>
            <p class="mt-2 text-gray-600">Kelola pesanan yang masuk untuk mobil Anda</p>
        </div>

        <div class="mb-6">
            <nav class="flex space-x-8">
                <a href="{{ route('owner.dashboard') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm">
                    Dashboard
                </a>
                <a href="{{ route('owner.orders') }}" class="border-b-2 border-blue-500 text-blue-600 px-3 py-2 font-medium text-sm">
                    Pesanan Masuk
                </a>
                <a href="{{ route('owner.history') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-sm">
                    Histori
                </a>
            </nav>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">
                                Pesanan #{{ $order->id }} - {{ $order->car->name }}
                            </h3>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Menunggu Konfirmasi
                            </span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Dipesan pada {{ $order->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                    
                    <div class="px-6 py-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Informasi Penyewa</h4>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">Nama:</span>
                                        <span class="text-sm text-gray-900">{{ $order->user->name }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">Email:</span>
                                        <span class="text-sm text-gray-900">{{ $order->user->email }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">No. HP:</span>
                                        <span class="text-sm text-gray-900">{{ $order->phone ?? '-' }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-24">No. KTP:</span>
                                        <span class="text-sm text-gray-900">{{ $order->id_number ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 mb-3">Detail Pemesanan</h4>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Tanggal Mulai:</span>
                                        <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($order->start_date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Tanggal Selesai:</span>
                                        <span class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($order->end_date)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Durasi:</span>
                                        <span class="text-sm text-gray-900">{{ $order->duration }} hari</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-sm text-gray-500 w-32">Total Biaya:</span>
                                        <span class="text-sm font-semibold text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($order->notes)
                        <div class="mt-4">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Catatan Tambahan</h4>
                            <p class="text-sm text-gray-600 bg-gray-50 p-3 rounded">{{ $order->notes }}</p>
                        </div>
                        @endif
                        
                        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-4">
                                @if($order->car->image)
                                    <img src="{{ asset('storage/' . $order->car->image) }}" alt="{{ $order->car->name }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 016 0v6a3 3 0 01-3 3z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <h5 class="text-sm font-medium text-gray-900">{{ $order->car->name }}</h5>
                                    <p class="text-sm text-gray-500">{{ $order->car->brand }} • {{ $order->car->year }}</p>
                                    <p class="text-sm text-gray-500">{{ ucfirst($order->car->transmission) }} • {{ $order->car->fuel_type }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                        <button onclick="rejectOrder({{ $order->id }})" class="px-4 py-2 border border-red-300 text-red-700 rounded-md hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200">
                            Tolak
                        </button>
                        <button onclick="confirmOrder({{ $order->id }})" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                            Konfirmasi
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-white shadow rounded-lg">
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada pesanan masuk</h3>
                    <p class="mt-1 text-sm text-gray-500">Saat ini tidak ada pesanan yang menunggu konfirmasi.</p>
                </div>
            </div>
        @endif
    </div>

<div id="rejectionModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Alasan Penolakan</h3>
            <form id="rejectionForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="action" value="reject">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Berikan alasan penolakan:</label>
                    <textarea name="rejection_reason" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Masukkan alasan penolakan..." required></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeRejectionModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition duration-200">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition duration-200">
                        Tolak Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmOrder(orderId) {
    Swal.fire({
        title: 'Konfirmasi Pesanan',
        text: 'Apakah Anda yakin ingin mengkonfirmasi pesanan ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#10B981',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Ya, Konfirmasi',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/owner/orders/${orderId}/confirm`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'PUT';
            
            const actionField = document.createElement('input');
            actionField.type = 'hidden';
            actionField.name = 'action';
            actionField.value = 'accept';
            
            form.appendChild(csrfToken);
            form.appendChild(methodField);
            form.appendChild(actionField);
            document.body.appendChild(form);
            form.submit();
        }
    });
}

function rejectOrder(orderId) {
    document.getElementById('rejectionForm').action = `/owner/orders/${orderId}/confirm`;
    document.getElementById('rejectionModal').classList.remove('hidden');
}

function closeRejectionModal() {
    document.getElementById('rejectionModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('rejectionModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeRejectionModal();
    }
});
</script>
@endpush
@endsection