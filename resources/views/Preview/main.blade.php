<!-- Preview Lama -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Partner - Luxury Car Rentals</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
  <style>
    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;

    }

    body {
      background-color: white;
      color: #333;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Header and Navigation */
  </style>
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="relative font-poppins">
  <!-- Header Navigation -->
  <header id="header">
    <nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 z-10 transition-all duration-300">

      <div class="flex items-center">
        <img src="/images/logo.png" alt="Logo" class="logo">
        <p class="rental font-medium text-white"> Rental Partner</p>
      </div>

      <div class="flex items-center">
        <ul class="hidden md:flex items-center text-white font-medium">

          <a href="{{route('login')}}" class=" !text-white bg-gradient-to-r !ml-5 !mt-4 !mr-3 from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm !px-7 !py-3 text-center me-2 !mb-5">LOGIN NOW</a>
  </header>

  @include('user.hero')
  @include('user.about')
  @include('user.service')
  @include('user.review')

<section class="bg-gray-100 py-10 !pb-32" id="featured-cars">


  <div class="container mx-auto px-4 !mb-20">
    <div class="flex justify-between items-center mb-6 ">
      <h2 class="text-xl font-bold text-blue-600 !ml-30">Featured Cars</h2>
    </div>

    <div class=" w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 items-stretch !ml-25  ">

      @foreach ($cars as $car)
      <div class="bg-white rounded-2xl shadow-md flex flex-col h-full transform transition duration-500 hover:scale-105 hover:shadow-2xl hover:-translate-y-2 !mb-0 ">
        <img src="{{ asset('images/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover rounded-t-2xl" />
        <div class="p-6 flex flex-col flex-grow justify-between">
          <div>
            <h3 class="text-2xl font-bold mb-2 text-gray-800 text-center !mt-10">{{ $car->name }}</h3>
            <p class="text-center text-blue-700 font-bold text-lg mb-4">Rp {{ number_format($car->price, 0, ',', '.') }}<span class="text-gray-600 font-normal text-sm">/ DAY</span></p>
            <div class="flex justify-center space-x-4 text-gray-500 text-sm mb-6 mt-7">
              <div class="flex items-center space-x-1">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
</svg></span>
                <span> &nbsp;{{ $car->seats }} Seats &nbsp;</span>
              </div>
              <div class="flex items-center space-x-1">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
  <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>
</svg></span>
                <span> &nbsp;{{ $car->transmission }} &nbsp;</span>
              </div>
              <div class="flex items-center space-x-1">
                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
</svg></span>
                <span>&nbsp;{{ $car->year }}</span>
              </div>
            </div>
          </div>
          <a href="{{ route('cars.detail', ['id' => $car->id]) }}" class="book block bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 !text-white font-bold text-center py-5 rounded-xl transition duration-300 transform hover:scale-105 hover:shadow-lg mt-4">
            VIEW DETAILS
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
    
  @include('layouts.footer')

  <script>
    // Simple script to handle header transparency
    window.addEventListener('scroll', function() {
      const header = document.querySelector('header');
      if (window.scrollY > 100) {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
      } else {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
      }
    });
  </script>
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