<!-- Navbar -->
<nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 z-10 transition-all duration-300 
  {{ Request::is('/') || Request::is('index')? 'bg-transparent' : 'bg-black' }}">

  <div class="flex items-center">
    <img src="/images/logo.png" alt="Logo" class="logo">
    <p class="rental font-medium text-white"> Rental Partner</p>
  </div>

  <div class="flex items-center">
    <ul class="hidden md:flex items-center text-white font-medium">
      <li class="nav-item"><a href="#" class="nav-link hover:!text-blue-500">HOME</a></li>
      <li class="nav-item"><a href="#" class="nav-link hover:!text-blue-500">ABOUT</a></li>
      
      <button id="dropdownDefaultButton" class="nav-link dropdown hover:!text-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
        SERVICE &nbsp;
        <svg class="w-2.5 h-2.5 ms-3"><path stroke="currentColor" ... /></svg>
      </button>
      
  <img id="avatarButton"
     type="button"
     data-dropdown-toggle="userDropdown"
     data-dropdown-placement="bottom-start"
     class="w-10 h-10 rounded-full cursor-pointer !mr-10"
     src="https://www.gravatar.com/avatar/?d=mp"
     alt="User avatar">

<!-- Dropdown menu -->
<div id="userDropdown" class="z-10 hidden  divide-y divide-gray-100 rounded-lg shadow-sm w-44 bg-black dark:divide-gray-600">
    <div class="px-4 py-3 text-sm !text-white dark:text-white">
      <div>{{auth()->user()->name}}</div>
      <div class="font-medium truncate">{{auth()->user()->email}}</div>
    </div>

    <ul class="py-2 text-sm !text-white dark:text-gray-200" aria-labelledby="avatarButton">
    <li>
  <a href="{{ url('/profile/edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-blue-600 dark:hover:!text-white">Edit Profile</a>
</li>


   

      @auth
        @if(auth()->user()->owner)
          @if(auth()->user()->owner->status_verifikasi === 'approved')
            <li>
              <a href="{{ route('owner.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-blue-600 dark:hover:!text-white">Dashboard Owner</a>
            </li>
          @elseif(auth()->user()->owner->status_verifikasi === 'pending')
            <li>
              <span class="block px-4 py-2 text-yellow-400">Menunggu Persetujuan Admin</span>
            </li>
          @elseif(auth()->user()->owner->status_verifikasi === 'rejected')
            <li>
              <span class="block px-4 py-2 text-red-400">Upgrade Ditolak</span>
            </li>
          @endif
        @else
          <li>
            <a href="{{ url('/upgrade') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-blue-600 dark:hover:!text-white">Upgrade Account</a>
          </li>
        @endif
      @endauth

    </ul>

    <div class="py-1">
      <a href="#" class="block px-4 py-2 text-sm !text-white hover:bg-blue-600 dark:hover:bg-blue-600 dark:text-gray-200 dark:hover:!text-white">Sign out</a>
    </div>
</div>

    
    </ul>
   
  </div>
</nav>