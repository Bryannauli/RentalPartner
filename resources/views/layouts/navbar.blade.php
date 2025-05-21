<!-- Navbar -->
<nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 z-10 transition-all duration-300 
  {{ Request::is('/') ? 'bg-transparent' : 'bg-black' }}">

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
<div id="userDropdown" class="z-10 hidden  divide-y divide-gray-100 rounded-lg shadow-sm w-44 bg-gray-700 dark:divide-gray-600">
    <div class="px-4 py-3 text-sm !text-white dark:text-white">
      <div>Bonnie Green</div>
      <div class="font-medium truncate">name@flowbite.com</div>
    </div>
    <ul class="py-2 text-sm !text-white dark:text-gray-200" aria-labelledby="avatarButton">
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-blue-600 dark:hover:!text-white">Dashboard</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-blue-600 dark:hover:!text-white">Settings</a>
      </li>
      <li>
        <a href="{{ url('/upgrade') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-blue-600 dark:hover:!text-white">Upgrade Account</a>
      </li>
    </ul>
    <div class="py-1">
  
      <a href="#" class="block px-4 py-2 text-sm !text-white hover:bg-blue-600 dark:hover:bg-blue-600 dark:text-gray-200 dark:hover:!text-white">Sign out</a>
    </div>
</div>

    
    </ul>
   
  </div>
</nav>