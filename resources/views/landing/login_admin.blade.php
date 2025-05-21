<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearShift - Login & Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
      @vite('resources/css/app.css')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8f8f8;
            color: #333;
            line-height: 1.6;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Header and Navigation */
        
        
        .logo {
            display: flex;
            align-items: center;
            color: white;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        
        .btn {
            background-color: #4108ec;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #4108ec;
        }
        
        /* Auth Container Styles */
        .auth-container {
            min-height: 100vh;
            display: flex;
            padding-top: 80px; /* Header height + spacing */
        }
        
        .auth-image {
            flex: 1;
            background-image: url('/api/placeholder/1200/800');
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .auth-image-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 2rem;
            max-width: 500px;
        }
        
        .auth-image-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .auth-image-content p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .auth-forms {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 3rem;
            background-color: white;
        }
        
        .form-tabs {
            display: flex;
            margin-bottom: 2rem;
            border-bottom: 1px solid #eee;
        }
        
        .form-tab {
            padding: 1rem 2rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .form-tab.active {
            color: #4108ec;
            border-bottom: 3px solid #4108ec;
        }
        
        .form-container {
            max-width: 450px;
            margin: 0 auto;
        }
        
        .form-title {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        .form-subtitle {
            color: #777;
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            border-color: #4108ec;
            outline: none;
        }
        
        .forgot-password {
            display: block;
            text-align: right;
            margin-top: -0.5rem;
            margin-bottom: 1.5rem;
            color: #777;
            font-size: 0.9rem;
        }
        
        .forgot-password:hover {
            color: #4108ec;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .remember-me input {
            margin-right: 0.5rem;
        }
        
        .admin-login {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 1.5rem;
        }
        
        .admin-login a {
            color: #777;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        
        .admin-login a:hover {
            color: #4108ec;
        }
        
        .button-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .create-account-link {
            color: #777;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        
        .create-account-link:hover {
            color: #4108ec;
        }
        
        .login-btn {
            padding: 0.8rem 8rem;
            font-size: 1rem;
        }
        
        .social-login {
            text-align: center;
            margin-top: 1.5rem;
        }
        
        .social-login-title {
            position: relative;
            margin-bottom: 1.5rem;
            color: #777;
        }
        
        .social-login-title::before,
        .social-login-title::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 35%;
            height: 1px;
            background-color: #ddd;
        }
        
        .social-login-title::before {
            left: 0;
        }
        
        .social-login-title::after {
            right: 0;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            transition: transform 0.3s;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
        }
        
        .facebook {
            background-color: #3b5998;
        }
        
        .google {
            background-color:rgb(29, 8, 84);
        }
        
        .twitter {
            background-color: #1da1f2;
        }
        
        /* Form toggle */
        #register-form {
            display: none;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .auth-container {
                flex-direction: column;
            }
            
            .auth-image {
                height: 300px;
            }
            
            .auth-forms {
                padding: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 1rem 3%;
            }
            
            nav ul {
                display: none;
            }
            
            .auth-image-content h2 {
                font-size: 2rem;
            }
            
            .form-container {
                max-width: 100%;
            }
            
            .button-row {
                flex-direction: column;
                gap: 1rem;
            }
            
            .login-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body class="relative font-poppins">
    <!-- Header Navigation -->
    <header>
        <nav id="mainNav" class="fixed top-0 left-0 w-full flex items-center justify-between px-8 py-4 z-10 transition-all duration-300 
   {{ Request::is('/') ? 'bg-transparent' : 'bg-black' }}">

  <div class="flex items-center font-poppins">
    <img src="/images/logo.png" alt="Logo" class="logo">
    <p class="rental font-medium text-white"> Rental Partner</p>
  </div>

  <div class="flex items-center">
    <ul class="hidden md:flex items-center text-white font-medium">
      <li class="nav-item"><a href="#" class="nav-link hover:!text-blue-500">HOME</a></li>
      <li class="nav-item"><a href="#" class="nav-link hover:!text-blue-500">ABOUT</a></li>
      
      <button id="dropdownDefaultButton" class="nav-link dropdown hover:!text-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
        SERVICE &nbsp;
        <svg class="w-2.5 h-2.5 ms-3"><path stroke="currentColor" ... /></svg>
      </button>
    </header>

    <!-- Auth Container -->
    <div class="auth-container ">
        <!-- Left Side - Image -->
        <div class="auth-image"  style="background-image: url('{{ asset('images/hero.jpg') }}')">
            <div class="auth-image-content">
                <h2>Experience Luxury Driving</h2>
                <p>Join GearShift today to unlock premium cars and exclusive member benefits. Your journey to luxury starts here.</p>
                <a href="index.html" class="!text-white text-3sm bg-gradient-to-r !ml-8 !mt-5 from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg !px-5 !py-2.5 text-center me-2 mb-2">EXPLORE OUR FLEET</a>
            </div>
        </div>
        
        <!-- Right Side - Forms -->
        <div class="auth-forms">
            <div class="form-tabs ">
                <div class="form-tab active " id="login-tab">Login</div>
            </div>

            <!-- Cek berhasil atau tidak -->
            <div class="form-container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="form-container">
                <!-- Login Form -->
                <form id="login-form" method="POST" action="{{route('login_admin.submit')}}">
                    @csrf
                    <h2 class="form-title">Admin Login</h2>
                    <p class="form-subtitle">Sign in to confirm your account</p>
                    
                    <div class="form-group">
                        <label for="login-email">Email Address</label>
                        <input type="email" name="email" id="login-email" class="form-control" placeholder="Enter your email">
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" name="password" id="login-password" class="form-control" placeholder="Enter your password">
                    </div>
                    
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember" checked>
                        <label for="remember">Remember me</label>
                    </div>
                    
                    <div class="button-row">
                        <button type="submit" class="btn login-btn !text-white bg-gradient-to-r !ml-8 !mt-5 from-blue-500 via-blue-600 to-blue-700 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"">LOGIN</button>
                    </div>
                    
                    <div class="social-login">
                        <div class="social-buttons">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <script>
        const loginTab = document.getElementById('login-tab');
        const loginForm = document.getElementById('login-form');
        
        loginTab.addEventListener('click', function() {
            loginTab.classList.add('active');
            loginForm.style.display = 'block';
        });
        
        registerTab.addEventListener('click', function() {
            loginTab.classList.remove('active');
            loginForm.style.display = 'none';
        });
        
        // loginForm.addEventListener('submit', function(e) {
        //     // e.preventDefault();
        //     const email = document.getElementById('login-email').value;
        //     const password = document.getElementById('login-password').value;
            
        //     if(email && password) {
        //         alert('Login successful!');
        //     } else {
        //         alert('Please fill all required fields');
        //     }
        // });
        </script>
         <script>
        // Simple script to handle header transparency
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
            } else {
                header.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
            }
        });
    </script>
     <script>
    document.addEventListener("DOMContentLoaded", function() {
      const navbar = document.getElementById("mainNav");
      
      window.addEventListener("scroll", function() {
        if (window.scrollY > 50) {
          navbar.classList.add("navbar-scrolled");
        } else {
          navbar.classList.remove("navbar-scrolled");
        }
      });
      
      if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled");
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        
    </script>
</body>
</html>