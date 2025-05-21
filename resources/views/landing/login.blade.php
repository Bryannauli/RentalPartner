<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GearShift - Login & Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        header {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 1rem 5%;
            position: fixed;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            color: white;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 2rem;
        }
        
        nav ul li a {
            color: white;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #4108ec;
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
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header Navigation -->
    <header>
        <div class="logo">
            <img src="/api/placeholder/150/50" alt="RentalPartner Logo">
            <h2>RentalPartner</h2>
        </div>
    </header>

    <!-- Auth Container -->
    <div class="auth-container">
        <!-- Left Side - Image -->
        <div class="auth-image">
            <div class="auth-image-content">
                <h2>Experience Luxury Driving</h2>
                <p>Join GearShift today to unlock premium cars and exclusive member benefits. Your journey to luxury starts here.</p>
                <a href="index.html" class="btn">EXPLORE OUR FLEET</a>
            </div>
        </div>
        
        <!-- Right Side - Forms -->
        <div class="auth-forms">
            <div class="form-tabs">
                <div class="form-tab active" id="login-tab">Login</div>
                <div class="form-tab" id="register-tab">Register</div>
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
                <form id="login-form" method="POST" action="{{route('login.submit')}}">
                    @csrf
                    <h2 class="form-title">Welcome Back</h2>
                    <p class="form-subtitle">Sign in to continue to your account</p>
                    
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
                        <input type="checkbox" id="remember" checked>
                        <label for="remember">Remember me</label>
                    </div>
                    
                    <div class="admin-login">
                        <a href="#" id="admin-login-link">login as admin?</a>
                    </div>
                    
                    <div class="button-row">
                        <button type="submit" class="btn login-btn">LOGIN</button>
                    </div>
                    
                    <div class="social-login">
                        <div class="social-buttons">
                        </div>
                    </div>
                </form>
                
                <!-- Register Form -->
                <form id="register-form" method="POST" action="{{route('register')}}">
                    @csrf
                    <h2 class="form-title">Create an Account</h2>
                    <p class="form-subtitle">Join GearShift for exclusive luxury car rentals</p>
                    
                    <!-- Name -->
                    <div class="form-group">
                        <label for="register-name">Full Name</label>
                        <input type="text" name="register-name" id="register-name" class="form-control" placeholder="Enter your full name">
                    </div>
                    
                    <!-- Email -->
                    <div class="form-group">
                        <label for="register-email">Email Address</label>
                        <input type="email" name="register-email" id="register-email" class="form-control" placeholder="Enter your email">
                    </div>
                    
                    <!-- Phone number -->
                    <div class="form-group">
                        <label for="register-phone">Phone Number</label>
                        <input type="tel" name="register-phone" id="register-phone" class="form-control" placeholder="Enter your phone number">
                    </div>
                    
                    <!-- Password -->
                    <div class="form-group">
                        <label for="register-password">Password</label>
                        <input type="password" name="register-password" id="register-password" class="form-control" placeholder="Create a password">
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="register-confirm-password">Confirm Password</label>
                        <input type="password" name="register-confirm-password" id="register-confirm-password" class="form-control" placeholder="Confirm your password">
                    </div>
                    
                    <div class="remember-me">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">I agree to the Terms & Conditions</label>
                    </div>
                    
                     <div class="button-row">
                        <button type="submit" class="btn login-btn">REGISTER</button>
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
        const registerTab = document.getElementById('register-tab');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        
        loginTab.addEventListener('click', function() {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        });
        
        registerTab.addEventListener('click', function() {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.style.display = 'block';
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
</body>
</html>