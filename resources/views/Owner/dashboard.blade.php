<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Penyewaan Mobil Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans">

    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">Dashboard Pemilik</h1>
            <div>
                <a href="{{ route('owner.orders') }}" class="text-indigo-600 hover:text-indigo-800 mx-4">Pesanan</a>
                <a href="{{ route('owner.history') }}" class="text-indigo-600 hover:text-indigo-800 mx-4">Histori Penyewaan</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800">Keluar</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-semibold text-gray-900 mb-8">Mobil yang Anda Sewakan</h2>

        @if(session('status'))
            <div class="mb-6 px-4 py-3 rounded-md bg-green-100 text-green-800 border border-green-300">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($cars as $car)
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    @if($car->image_url)
                        <img src="{{ $car->image_url }}" alt="Foto {{ $car->make }} {{ $car->model }}" class="rounded-lg w-full h-48 object-cover mb-4" onerror="this.onerror=null;this.src='https://placehold.co/600x400/png?text=Tidak+Ada+Gambar';" />
                    @else
                        <img src="https://placehold.co/600x400/png?text=Tidak+Ada+Gambar" alt="Tidak ada gambar tersedia" class="rounded-lg w-full h-48 object-cover mb-4" />
                    @endif
                    <h3 class="text-xl font-semibold text-gray-800">{{ $car->make }} {{ $car->model }} ({{ $car->year }})</h3>
                    <p class="text-gray-600 mt-2 whitespace-pre-line">{{ $car->description ?? 'Deskripsi belum tersedia.' }}</p>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('owner.cars.edit', $car->id) }}"
                        class="inline-block w-full bg-indigo-600 hover:bg-indigo-700 rounded-md text-white py-2 font-medium transition"
                        aria-label="Perbarui deskripsi untuk {{ $car->make }} {{ $car->model }}"
                    >
                        Perbarui Deskripsi
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-600 col-span-full text-center">Anda belum menambahkan mobil apapun.</p>
            @endforelse
        </div>
    </main>
</body>
</html>
