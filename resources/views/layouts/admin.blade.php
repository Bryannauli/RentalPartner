<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Rental Partner Admin' }}</title>
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white min-h-screen">
        <div class="p-6 border-b border-slate-600">
            <h1 class="text-2xl font-bold">Rental Partner</h1>
            <p class="text-sm text-slate-300">Admin Dashboard</p>
        </div>
        <ul class="mt-4 space-y-2">
            @php
                $menus = [
                    'dashboard' => 'Dashboard',
                    'users' => 'Pengguna',
                    'owner-requests' => 'Permintaan Owner',
                    'posts' => 'Postingan Mobil',
                    'reports' => 'Laporan',
                    'settings' => 'Pengaturan'
                ];
            @endphp
            @foreach ($menus as $route => $label)
                <li>
                    <a href="{{ route($route) }}"
                        class="block px-6 py-3 hover:bg-slate-700 {{ request()->routeIs($route) ? 'bg-blue-600 font-semibold' : '' }}">
                        <i class="fas fa-angle-right mr-2"></i> {{ $label }}
                    </a>
                </li>
            @endforeach
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-6 py-3 hover:bg-red-600 bg-red-500">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">{{ $title ?? 'Halaman' }}</h2>
            <div class="flex items-center gap-2">
                <span class="text-gray-700">Admin</span>
                <img src="https://cdn-icons-png.flaticon.com/256/6522/6522516.png"
                     class="w-10 h-10 rounded-full object-cover" alt="Admin Avatar">
            </div>
        </div>

        <!-- Alerts -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
