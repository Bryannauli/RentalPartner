<nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-4 sm:px-8 py-2 z-10 transition-all duration-300 
  {{ Request::is('/') || Request::is('index') ? 'bg-transparent' : 'bg-black' }}">

  <div class="flex items-center">
    <img src="/images/logo.png" alt="Logo" class="logo h-10 w-auto sm:h-12">
    <p class="rental font-medium text-white ml-2">Rental Partner</p>
  </div>

  <div class="flex items-center space-x-4 sm:space-x-6 ">
    <ul class="hidden md:flex items-center text-white font-medium space-x-6 okay gap-10">
      <li>
        <a href="{{ route('home') }}" title="Home" class="block p-3 rounded-full  hover:bg-white/20 hover:text-blue-400 transition-all duration-300">
          <i class="fas fa-home text-xl"></i>
        </a>
      </li>
      <li>
        <a href="{{ Route::currentRouteName() === 'user.index' ? '#about' : route('user.index') . '#about' }}" title="About" class="block p-3 rounded-full  hover:bg-white/20 hover:text-blue-400 transition-all duration-300">
          <i class="fas fa-info-circle text-xl"></i>
        </a>
      </li>
      <li>
        <a href="{{ Route::currentRouteName() === 'user.index' ? '#service' : route('user.index') . '#service' }}" title="Service" class="block p-3 rounded-full hover:bg-white/20 hover:text-blue-400 transition-all duration-300">
          <i class="fas fa-concierge-bell text-xl"></i>
        </a>
      </li>
      <li>
        <a href="{{ route('user.history') }}" title="Riwayat Pesanan" class="block p-3 rounded-full hover:bg-white/20 hover:text-blue-400 transition-all duration-300">
          <i class="fas fa-history text-xl"></i>
        </a>
      </li>
    </ul>

    <div class="relative ">
      <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
          class="w-10 h-10 rounded-full okay cursor-pointer"
          src="{{ (auth()->user()->avatar) ? asset('storage/' . auth()->user()->avatar) : asset('https://www.gravatar.com/avatar/?d=mp') }}"
          alt="User avatar">

      <div id="userDropdown" class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow-sm w-44 bg-black dark:divide-gray-600">
        <div class="px-4 py-3 text-sm !text-white dark:text-white">
          @auth
          <div>{{ auth()->user()->name }}</div>
          <div class="font-medium truncate">{{ auth()->user()->email }}</div>
          @endauth
        </div>

        <ul class="py-2 text-sm !text-white dark:text-gray-200" aria-labelledby="avatarButton">
          <li>
            <a href="{{ url('/profile/edit') }}" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-blue-600 dark:hover:!text-white">Edit Profile</a>
          </li>

          @auth
            @if(optional(auth()->user())->owner && auth()->user()->owner->status_verifikasi === 'approved')
              <!-- jika owner ditangguhkan tidak bisa buka dashboard owner -->
              @if(auth()->user()->owner->status === 'suspended')
                <li>
                  <span class="block px-4 py-2 text-red-400 cursor-default">Owner Ditangguhkan</span>
                </li>
              @else
                <li>
                  <a href="{{ route('owner.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-blue-600 dark:hover:!text-white">Dashboard Owner</a>
                </li>
              @endif
            @elseif(optional(auth()->user())->owner && auth()->user()->owner->status_verifikasi === 'pending')
              <li>
                <span class="block px-4 py-2 text-yellow-400 cursor-default">Menunggu Persetujuan</span>
              </li>
            @elseif(optional(auth()->user())->owner && auth()->user()->owner->status_verifikasi === 'rejected')
              <li>
                <span class="block px-4 py-2 text-red-400 cursor-default">Upgrade Ditolak</span>
              </li>
            @else
              <li>
                <a href="{{ url('/upgrade') }}" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-blue-600 dark:hover:!text-white">Upgrade Account</a>
              </li>
            @endif
          @endauth
        </ul>

        <div class="py-1">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm !text-white hover:bg-gray-700 dark:hover:bg-blue-600 dark:hover:!text-white">
              Sign out
            </a>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</nav>