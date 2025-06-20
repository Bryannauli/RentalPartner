@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
 <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-3 bg-gray-700 text-gray-300 border rounded-lg @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
          <!-- New Password -->
        <div class="mb-4 relative">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">New Password</label>
            <input type="password" id="password" name="password" required
                class="w-full px-4 py-3 border bg-gray-700 rounded-lg text-gray-300 pr-12 @error('password') border-red-500 @enderror">
            <button
        type="button"
        onclick="togglePassword('password', 'eyeIcon1')"
        class="absolute mt-7 right-3 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
        <i id="eyeIcon1" class="fa-solid fa-eye"></i>
      </button>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


   <div class="mb-6 relative">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                class="w-full px-4 py-3 border text-gray-300 bg-gray-700 rounded-lg pr-12">
           <button
          type="button"
          onclick="togglePassword('password_confirmation', 'eyeIcon2')"
          class="absolute mt-6 right-3 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
          <i id="eyeIcon2" class="fa-solid fa-eye"></i>
        </button>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition">
            Reset Password
        </button>
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
