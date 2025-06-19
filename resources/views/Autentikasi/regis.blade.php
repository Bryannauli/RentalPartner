@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <h2 class="text-3xl font-bold text-center text-blue-600">Create an Account</h2>
    <p class="text-center text-gray-300 mt-2 mb-8">Join us for exclusive luxury car rentals.</p>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
            <input type="text" name="register-name" id="register-name" class="w-full px-4 py-3  bg-gray-700 border hover:bg-gray-700 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your full name" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
            <input type="email" name="register-email" id="register-email" class="w-full px-4 py-3 bg-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email" required>
        </div>
        
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number</label>
            <input type="tel" name="register-phone" id="register-phone" class="w-full px-4 py-3 bg-gray-700 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your phone number" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
            <div class="relative">
  <input 
    type="password" 
    name="register-password" 
    id="register-password" 
    class="w-full  px-4 py-3 pr-12 bg-gray-700 text-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
    placeholder="Enter your password" 
    required
  >

  <!-- Eye Icon -->
  <button 
    type="button" 
    onclick="togglePassword('register-password', 'eyeIcon1')"  
    class="absolute mt-7 right-3 transform -translate-y-1/2 text-gray-400 hover:text-blue-500"
  >
    <i id="eyeIcon1" class="fa-solid fa-eye"></i>
  </button>
</div>
        
        <div class="mb-6 mt-3">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password</label>
           <div class="relative">
  <input 
    type="password" 
    name="register-confirm-password" 
    id="register-confirm-password" 
    class="w-full  px-4 py-3 pr-12 bg-gray-700 hover:bg-gray-700 text-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
    placeholder="Confirm your password" 
    required
  >

  <!-- Eye Icon -->
  <button 
    type="button" 
    onclick="togglePassword('register-confirm-password', 'eyeIcon2')" 
    class="absolute mt-6 right-3 transform -translate-y-1/2 text-gray-400 hover:text-blue-500"
  >
    <i id="eyeIcon2" class="fa-solid fa-eye"></i>
  </button>
</div>

        
        <div class="flex items-center mb-6 mt-3">
            <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 border-gray-300 !bg-gray-700 rounded focus:ring-blue-500" required>
            <label for="terms" class="ml-2 block text-sm text-gray-300">I agree to the <a href="#" class="text-blue-600 hover:underline">Terms & Conditions</a></label>
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-300">
                REGISTER
            </button>
        </div>

        <p class="text-center text-sm text-gray-300 mt-8">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">
                Sign in
            </a>
        </p>
    </form>
<script>
  function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      input.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  }
</script>

@endsection