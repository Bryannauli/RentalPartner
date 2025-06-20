<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Rental Partner - Owner Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gray-100 min-h-screen flex">

    @include('owner.sidebar')

    <main class="flex-1 p-8 overflow-y-auto">
        <header class="flex justify-between items-center mb-8">
            <h2 id="page-title" class="text-4xl font-semibold tracking-tight text-gray-900">
                @yield('page-title', 'Dashboard')
            </h2>
            <div class="flex items-center gap-3">
                <span class="text-gray-700 font-medium">
                    {{ auth()->user()->name }}
                </span>
                <img src="https://cdn-icons-png.flaticon.com/256/6522/6522516.png" alt="Admin" class="h-10 w-10 rounded-full object-cover" />
            </div>
        </header>
        
        @if (session('success'))
            <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 px-4 py-3 rounded bg-red-100 text-red-800 font-semibold">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')

</body>
</html>