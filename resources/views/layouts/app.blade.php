<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
  @vite('resources/css/app.css')
</head>
<body class="relative font-poppins">
  @include('layouts.navbar')
  
  <main>
    @yield('content')
  </main>


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