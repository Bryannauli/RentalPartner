@extends('layouts.app')

@section('title', 'Login - Rental Partner')

@section('content')

    <header class="fixed top-0 left-0 w-full z-50 bg-black/80 backdrop-blur-sm">
        <nav class="flex items-center justify-between px-8 py-4">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 mr-3">
                <p class="text-white font-medium text-xl">Rental Partner</p>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-white hover:text-blue-500 transition-colors">HOME</a>
                <a href="#" class="text-white hover:text-blue-500 transition-colors">ABOUT</a>
                <a href="#" class="text-white hover:text-blue-500 transition-colors">SERVICE</a>
            </div>
        </nav>
    </header>

    @if (session('success'))
        <div class="fixed top-20 right-4 z-50 max-w-sm w-full">
            <div class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-pulse">
                <i class="fas fa-check-circle text-xl"></i>
                <div>
                    <p class="font-semibold">Success!</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-20 right-4 z-50 max-w-sm w-full">
            <div class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-pulse">
                <i class="fas fa-exclamation-circle text-xl"></i>
                <div>
                    <p class="font-semibold">Error!</p>
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="fixed top-20 right-4 z-50 max-w-sm w-full">
            <div class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg animate-pulse">
                <div class="flex items-center space-x-3 mb-2">
                    <i class="fas fa-exclamation-triangle text-xl"></i>
                    <p class="font-semibold">Validation Error!</p>
                </div>
                <ul class="text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="min-h-screen flex pt-20">
        <div class="hidden lg:flex lg:w-1/2 relative">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-purple-600/20"></div>
            <img src="{{ asset('images/hero.jpg') }}" alt="Luxury Car" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <div class="text-center text-white px-8">
                    <h2 class="text-4xl font-bold mb-4">Experience Luxury Driving</h2>
                    <p class="text-lg mb-8">Welcome back to <span class="text-blue-400">Rental Partner</span>. Sign in to access your premium car rental account.</p>
                    <a href="{{ route('home') }}" class="inline-block bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold px-8 py-3 rounded-lg transition-all transform hover:scale-105">
                        EXPLORE OUR FLEET
                    </a>
                </div>
            </div>
        </div>
        
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back</h2>
                        <p class="text-gray-600">Sign in to continue to your account</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>Email Address
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   value="{{ old('email') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror" 
                                   placeholder="Enter your email address"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                            </label>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('password') border-red-500 @enderror" 
                                   placeholder="Enter your password"
                                   required>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors">
                                Forgot Password?
                            </a>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-semibold py-3 rounded-lg transition-all transform hover:scale-105 focus:ring-4 focus:ring-blue-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>LOGIN
                        </button>
                        
                        <div class="text-center">
                            <p class="text-gray-600">Don't have an account? 
                                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors">
                                    Create Account
                                </a>
                            </p>
                        </div>
                    </form>
                    
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-center space-x-4">
                            <button class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button class="w-12 h-12 bg-red-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-google"></i>
                            </button>
                            <button class="w-12 h-12 bg-blue-400 hover:bg-blue-500 text-white rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection