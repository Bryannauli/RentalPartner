<!DOCTYPE html>
<html lang="id" >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perbarui Deskripsi Mobil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans flex items-center justify-center p-6">

    <main class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8">
        <h1 class="text-2xl font-semibold mb-6 text-gray-900 text-center">Perbarui Deskripsi Mobil</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('owner.cars.update', $car->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="description" class="block mb-2 font-medium text-gray-700">Deskripsi Mobil</label>
                <textarea id="description" name="description" rows="6" required
                    class="w-full p-3 border border-gray-300 rounded-md text-gray-800 focus:outline-indigo-600">{{ old('description', $car->description) }}</textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('owner.dashboard') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Batal</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-md px-6 py-2 font-semibold transition">
                    Simpan
                </button>
            </div>
        </form>
    </main>
</body>
</html>
