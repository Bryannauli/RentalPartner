@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <h2 class="text-3xl font-bold text-center text-gray-900">Lupa Kata Sandi?</h2>
    <p class="text-center text-gray-600 mt-2 mb-8">Jangan khawatir. Cukup masukkan email Anda di bawah ini dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.</p>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror" value="{{ old('email') }}" placeholder="Masukkan email terdaftar Anda" required>
            
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-300">
                KIRIM TAUTAN RESET KATA SANDI
            </button>
        </div>

        <p class="text-center text-sm text-gray-600 mt-8">
            Ingat kata sandi Anda? 
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">
                Kembali ke Login
            </a>
        </p>
    </form>
@endsection