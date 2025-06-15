@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h2 class="text-3xl font-bold text-center text-gray-900">Create an Account</h2>
    <p class="text-center text-gray-600 mt-2 mb-8">Join us for exclusive luxury car rentals.</p>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your full name" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email" required>
        </div>
        
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
            <input type="tel" name="phone" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your phone number" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Create a password" required>
        </div>
        
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Confirm your password" required>
        </div>
        
        <div class="flex items-center mb-6">
            <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required>
            <label for="terms" class="ml-2 block text-sm text-gray-900">I agree to the <a href="#" class="text-blue-600 hover:underline">Terms & Conditions</a></label>
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-300">
                REGISTER
            </button>
        </div>

        <p class="text-center text-sm text-gray-600 mt-8">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">
                Sign in
            </a>
        </p>
    </form>
@endsection