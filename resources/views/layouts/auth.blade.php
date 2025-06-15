<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Rental Partner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-poppins bg-gray-50">

    <div class="flex min-h-screen">
        <div class="hidden lg:flex w-1/2 items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/hero.jpg') }}')">
            <div class="relative z-10 max-w-md text-center text-white p-8">
                <h2 class="text-4xl font-bold mb-4">Experience Luxury Driving</h2>
                <p class="text-lg text-gray-200 mb-6">Join <span class="font-semibold text-blue-400">Rental Partner</span> today to unlock premium cars and exclusive member benefits. Your journey to luxury starts here.</p>
                <a href="/" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-300">
                    EXPLORE OUR FLEET
                </a>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <div class="flex justify-center items-center mb-4">
                        <img src="/images/logo.png" alt="Logo" class="h-12 mr-2">
                        <h1 class="text-2xl font-bold text-gray-800">Rental Partner</h1>
                    </div>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
            
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('content')


            </div>
        </div>
    </div>

</body>
</html>