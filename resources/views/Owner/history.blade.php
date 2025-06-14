<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Histori Penyewaan - Dashboard Pemilik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans">

<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Histori Penyewaan</h1>
        <div>
            <a href="{{ route('owner.dashboard') }}" class="text-indigo-600 hover:text-indigo-800 mx-4">Dashboard</a>
            <a href="{{ route('owner.orders') }}" class="text-indigo-600 hover:text-indigo-800 mx-4">Pesanan</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800">Keluar</button>
            </form>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-12">
    @if(session('status'))
        <div class="mb-6 px-4 py-3 rounded-md bg-green-100 text-green-800 border border-green-300">
            {{ session('status') }}
        </div>
    @endif

    @if($bookings->isEmpty())
        <p class="text-gray-600 text-center text-lg">Belum ada histori penyewaan.</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-indigo-600 text-white text-left">
                    <th class="px-6 py-3 rounded-tl-lg">Mobil</th>
                    <th class="px-6 py-3">Penyewa</th>
                    <th class="px-6 py-3">Tanggal Mulai</th>
                    <th class="px-6 py-3">Tanggal Selesai</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr class="@if($loop->even) bg-gray-50 @else bg-white @endif border-b border-gray-200">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                @if($booking->car->image_url)
                                    <img src="{{ $booking->car->image_url }}" alt="Foto {{ $booking->car->make }} {{ $booking->car->model }}" class="w-16 h-12 object-cover rounded-md" onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/3b533ec6-314e-4604-9316-260151a9d0e0.png';" />
                                @else
                                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1c797b61-b0ab-4d96-bc9b-25fd44c3f1fb.png" alt="Tidak ada gambar" class="w-16 h-12 object-cover rounded-md" />
                                @endif
                                <div class="text-gray-900 font-semibold">
                                    {{ $booking->car->make }} {{ $booking->car->model }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ $booking->renter->name }}
                            <div class="text-sm text-gray-500">{{ $booking->renter->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @if($booking->status === 'pending')
                                <span class="px-3 py-1 inline-block rounded-full bg-yellow-200 text-yellow-800 font-semibold">Menunggu</span>
                            @elseif($booking->status === 'confirmed')
                                <span class="px-3 py-1 inline-block rounded-full bg-blue-200 text-blue-800 font-semibold">Dikonfirmasi</span>
                            @elseif($booking->status === 'completed')
                                <span class="px-3 py-1 inline-block rounded-full bg-green-200 text-green-800 font-semibold">Selesai</span>
                            @elseif($booking->status === 'cancelled')
                                <span class="px-3 py-1 inline-block rounded-full bg-red-200 text-red-800 font-semibold">Dibatalkan</span>
                            @else
                                <span class="px-3 py-1 inline-block rounded-full bg-gray-200 text-gray-800 font-semibold">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="mt-6">
        {{ $bookings->links() }}
    </div>

</main>

</body>
</html>

