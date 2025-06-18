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
    @vite('resources/css/app.css')
    <style>
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
    </style>
</head>
<body class="relative font-poppins">
    <header>
        <nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 z-10 transition-all duration-300">
            <div class="flex items-center">
                <img src="/images/logo.png" alt="Logo" class="logo">
                <p class="rental font-medium text-white">Rental Partner</p>
            </div>
            <div class="flex items-center">
                <ul class="hidden md:flex items-center text-white font-medium">
                    <li class="nav-item"><a href="{{ route('user.index') }}" class="nav-link hover:!text-blue-500">HOME</a></li>
                    <li class="nav-item"><a href="{{ route('user.about') }}" class="nav-link hover:!text-blue-500">ABOUT</a></li>
                    <li class="nav-item"><a href="{{ route('user.service') }}" class="nav-link hover:!text-blue-500">SERVICE</a></li>
                    <a href="{{ route('login') }}" class="!text-white bg-gradient-to-r !ml-5 !mt-4 !mr-3 from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm !px-7 !py-3 text-center me-2 !mb-5">LOGIN NOW</a>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
            } else {
                header.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>