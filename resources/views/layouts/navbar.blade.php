<!-- Navbar -->
<nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 bg-transparent z-10 transition-all duration-300">
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
      
      <!-- Dropdown menu -->
      <div id="dropdown" class="z-10 hidden ...">...</div>
      
      <li class="nav-item"><a href="#" class="nav-link hover:!text-blue-500">CONTACT US</a></li>
      <button type="button" class="nav-sign text-blue-400 hover:!text-blue-600 ...">SIGN UP</button>
    </ul>
    <button class="nav-button !text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 ...">
      RENT NOW
    </button>
  </div>
</nav>