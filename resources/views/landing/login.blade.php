<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Rental Partner - Login & Register</title>
<!-- Font & Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Font Awesome & Flowbite -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>
</head>
<body class="!font-poppins bg-black text-gray-700 leading-relaxed">




<!-- HEADER -->
<header>
  <nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 z-10 transition-all duration-300 bg-transparent md:bg-black">
    <div class="flex items-center text-white font-medium">
      <img src="/images/logo.png" alt="Logo" class="h-10 mr-2" />
      <p>Rental Partner</p>
    </div>
    <div class="hidden md:flex items-center space-x-4 text-white font-medium">
      <a href="#" class="hover:text-blue-500">HOME</a>
      <a href="#" class="hover:text-blue-500">ABOUT</a>
      <button class="flex items-center px-4 py-2 rounded-lg text-sm font-medium hover:text-blue-500">
        SERVICE
        <svg class="w-2.5 h-2.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
      </button>
    </div>
  </nav>
</header>

<!-- Auth Container -->
<div class="flex min-h-screen pt-16 md:pt-20 flex-col md:flex-row">

  <!-- Left side image -->
  <div class="flex-1 bg-cover bg-center relative" style="background-image: url('{{ asset('images/hero.jpg') }}')">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-8 text-white text-center">
      <div class="max-w-md">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Experience Luxury Driving</h2>
        <p class="mb-6 text-lg">Join <span class="text-blue-500 font-semibold">Rental Partner</span> today to unlock premium cars and exclusive member benefits. Your journey to luxury starts here.</p>
        <a href="index.html" class="inline-block bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 text-white font-medium rounded-lg px-5 py-2.5 text-center mb-2">EXPLORE OUR FLEET</a>
      </div>
    </div>
  </div>

  <!-- Right side forms -->
  <div class="flex-1 bg-white p-8 md:p-12 flex flex-col justify-center">
    <!-- Tabs -->
    <div class="flex mb-8 border-b border-gray-300">
      <div id="login-tab" class="cursor-pointer px-4 py-2 font-semibold border-b-4 border-transparent hover:text-blue-500 active:border-blue-500 active:text-blue-500" onclick="showLogin()">Login</div>
      <div id="register-tab" class="cursor-pointer px-4 py-2 font-semibold border-b-4 border-transparent hover:text-blue-500" onclick="showRegister()">Register</div>
    </div>

    <!-- Flash messages -->
    <div class="mb-4">
      @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-2">{{ session('success') }}</div>
      @endif
      @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-2">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <!-- Forms -->
    <div>
      <!-- Login -->
      <form id="login-form" method="POST" action="{{route('login.submit')}}" class="space-y-4">
        @csrf
        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Welcome Back</h2>
        <p class="mb-4 text-gray-600">Sign in to continue to your account</p>
        <div>
          <label for="login-email" class="block mb-1 font-medium">Email Address</label>
          <input type="email" id="login-email" name="email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Enter your email" />
        </div>
        <div>
          <label for="login-password" class="block mb-1 font-medium">Password</label>
          <input type="password" id="login-password" name="password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Enter your password" />
        </div>
        <a href="#" class="block mb-4 text-sm text-gray-600 hover:text-blue-500">Forgot Password?</a>
        <div class="flex items-center mb-4">
          <input type="checkbox" id="remember" name="remember" checked class="mr-2" />
          <label for="remember" class="text-sm">Remember me</label>
        </div>
        <div class="mb-4">
          <button type="submit" class="w-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 text-white font-medium py-3 rounded-lg shadow-lg">LOGIN</button>
        </div>
      </form>

      <!-- Register -->
      <form id="register-form" method="POST" action="{{route('register')}}" class="space-y-4 hidden">
        @csrf
        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Create an Account</h2>
        <p class="mb-4 text-gray-600">Join Rental Partner for exclusive luxury car rentals</p>
        <div>
          <label for="register-name" class="block mb-1 font-medium">Full Name</label>
          <input type="text" id="register-name" name="register-name" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Enter your full name" />
        </div>
        <div>
          <label for="register-email" class="block mb-1 font-medium">Email Address</label>
          <input type="email" id="register-email" name="register-email" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Enter your email" />
        </div>
        <div>
          <label for="register-phone" class="block mb-1 font-medium">Phone Number</label>
          <input type="tel" id="register-phone" name="register-phone" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Enter your phone number" />
        </div>
        <div>
          <label for="register-password" class="block mb-1 font-medium">Password</label>
          <input type="password" id="register-password" name="register-password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Create a password" />
        </div>
        <div>
          <label for="register-confirm-password" class="block mb-1 font-medium">Confirm Password</label>
          <input type="password" id="register-confirm-password" name="register-confirm-password" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500" placeholder="Confirm your password" />
        </div>
        <div class="flex items-center mb-4">
          <input type="checkbox" id="terms" name="terms" class="mr-2" />
          <label for="terms" class="text-sm">I agree to the Terms & Conditions</label>
        </div>
        <div>
          <button type="submit" class="w-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 text-white font-medium py-3 rounded-lg shadow-lg">REGISTER</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
  function showLogin() {
    document.getElementById('login-form').classList.remove('hidden');
    document.getElementById('register-form').classList.add('hidden');
    document.getElementById('login-tab').classList.add('border-b-4', 'border-blue-500');
    document.getElementById('register-tab').classList.remove('border-b-4', 'border-blue-500');
  }

  function showRegister() {
    document.getElementById('register-form').classList.remove('hidden');
    document.getElementById('login-form').classList.add('hidden');
    document.getElementById('register-tab').classList.add('border-b-4', 'border-blue-500');
    document.getElementById('login-tab').classList.remove('border-b-4', 'border-blue-500');
  }

  // Initialize default tab
  showLogin();
</script>

<!-- Optional: Scroll Header Transparency -->
<script>
  window.addEventListener('scroll', () => {
    const header = document.querySelector('header');
    if (window.scrollY > 100) {
      header.classList.add('bg-opacity-90', 'bg-black');
    } else {
      header.classList.remove('bg-opacity-90', 'bg-black');
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>