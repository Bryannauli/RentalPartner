<aside class="w-64 bg-gray-900 text-gray-100 flex flex-col p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight">Rental Partner</h1>
        <p class="text-gray-400 mt-1">Admin Dashboard</p>
    </div>

    <nav class="flex flex-col gap-3 flex-grow" id="admin-sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : '' }}">
            <i class="fas fa-chart-bar w-5"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.users') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.users') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.users') ? 'page' : '' }}">
            <i class="fas fa-users w-5"></i> <span>Pengguna</span>
        </a>
        <a href="{{ route('admin.owner') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.owner') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.users') ? 'page' : '' }}">
            <i class="fas fa-users w-5"></i> <span>Owner</span>
        </a>
        <a href="{{ route('admin.mobil') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.mobil') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.users') ? 'page' : '' }}">
            <i class="fas fa-users w-5"></i> <span>Daftar Mobil</span>
        </a>
        <a href="{{ route('admin.owner-requests') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.owner-requests') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.owner-requests') ? 'page' : '' }}">
            <i class="fas fa-user-check w-5"></i> <span>Permintaan Owner</span>
        </a>
        <a href="{{ route('admin.posts') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.posts') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.posts') ? 'page' : '' }}">
            <i class="fas fa-car w-5"></i> <span>Postingan Mobil</span>
        </a>
        <a href="{{ route('admin.review') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.review') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.reports') ? 'page' : '' }}">
            <i class="fas fa-flag w-5"></i> <span>Review</span>
        </a>
        <a href="{{ route('admin.history') }}" class="menu-item flex items-center gap-3 rounded-md px-3 py-2 {{ request()->routeIs('admin.history') ? 'bg-blue-700' : 'hover:bg-gray-800' }}" aria-current="{{ request()->routeIs('admin.settings') ? 'page' : '' }}">
            <i class="fas fa-cog w-5"></i> <span>History Pemesanan</span>
        </a>

    </nav>

    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 rounded-md px-3 py-2 bg-red-600 hover:bg-red-700 transition text-left">
            <i class="fas fa-sign-out-alt w-5"></i> <span>Keluar</span>
        </button>
    </form>
</aside>