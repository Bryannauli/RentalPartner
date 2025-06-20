<aside class="w-64 bg-gray-900 text-gray-100 flex flex-col p-6 h-screen sticky top-0">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight">Rental Partner</h1>
        <p class="text-gray-400 mt-1">Owner Dashboard</p>
    </div>

    <nav class="flex flex-col gap-3 flex-grow" id="admin-sidebar-nav">
        <a href="{{ route('owner.dashboard') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('owner.dashboard') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('owner.dashboard') ? 'page' : '' }}">
            <i class="fas fa-chart-bar w-5"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('owner.postingan') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('owner.postingan') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('owner.postingan') ? 'page' : '' }}">
            <i class="fas fa-newspaper w-5"></i> <span>Postingan</span>
        </a>
        <a href="{{ route('owner.riwayat') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('owner.riwayat') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('owner.riwayat') ? 'page' : '' }}">
            <i class="fas fa-history w-5"></i> <span>Riwayat Pemesanan</span>
        </a>
        <a href="{{ route('owner.order') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('owner.order') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('owner.order') ? 'page' : '' }}">
            <i class="fas fa-inbox w-5"></i> <span>Pesanan</span>
        </a>
    </nav>

    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 rounded-md px-3 py-2 bg-red-600 hover:bg-red-700 transition text-left">
            <i class="fas fa-sign-out-alt w-5"></i> <span>Keluar</span>
        </button>
    </form>
</aside>