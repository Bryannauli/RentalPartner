<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="//unpkg.com/alpinejs" defer></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cal+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>
  <link rel="stylesheet" href="{{ asset('css/ya.css') }}">



  @vite('resources/css/app.css')
</head>
<body class="relative font-poppins">
  <header id="header">
    @include('layouts.navbar')
  </header>
  
  <main>
    @yield('content')
  </main>

  @include('layouts.footer')


  <!-- navbar scrolled -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const navbar = document.getElementById("mainNav");
      
      window.addEventListener("scroll", function() {
        if (window.scrollY > 50) {
          navbar.classList.add("navbar-scrolled");
        } else {
          navbar.classList.remove("navbar-scrolled");
        }
      });
      
      if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled");
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>