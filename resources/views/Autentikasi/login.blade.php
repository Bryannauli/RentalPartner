@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<h2 class="text-3xl font-bold text-center text-blue-600">Welcome Back!</h2>
<p class="text-center text-gray-300 mt-2 mb-8">Sign in to continue to your account.</p>

<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email" required>
    </div>

    <div class="mb-6">
        <div class="flex justify-between items-center">
            <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
            <a href="{{route('password.request')}}" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
        </div>
        <div class="relative">
            <input
                type="password"
                name="password"
                id="password"
                class="w-full mt-2 px-4 py-3 pr-12 bg-gray-700 text-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                placeholder="Enter your password"
                required>

            <!-- Eye Icon -->
            <button
                type="button"
                onclick="togglePassword()"
                class="absolute mt-8 right-3 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
                <i id="eyeIcon" class="fa-solid fa-eye"></i>
            </button>
        </div>


        <div class="flex items-center mb-6 mt-2">
            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
        </div>


        <div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-300">
                LOGIN
            </button>
        </div>

        <p class="text-center text-sm text-gray-300 mt-8">
            Don't have an account?
            <a href="{{ route('register.form') }}" class="font-medium text-blue-600 hover:underline">
                Sign up
            </a>
        </p>
</form>
<script>
  function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    } else {
      passwordInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    }
  }
</script>
@endsection