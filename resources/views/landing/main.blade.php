<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Partner - Luxury Car Rentals</title>
    <style>
        /* Reset and Base Styles */
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
        }
        
        .btn:hover {
            background-color: #4108ec;
        }
        
        /* Hero Section */
        .hero {
            background-image: url('https://cdnjs.cloudflare.com/ajax/libs/placeholder-pics/1.1.0/placeholder.png');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            color: white;
            padding: 0 5%;
        }
        
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 600px;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .hero h1 span {
            color: #4108ec;
        }
        
        .hero p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        /* Stats Section */
        .stats {
            padding: 3rem 5%;
            display: flex;
            justify-content: space-around;
            text-align: center;
            background-color: white;
        }
        
        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #4108ec;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #777;
        }
        
        /* Featured Cars Section */
        .featured {
            padding: 3rem 5%;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .section-title {
            font-size: 1.8rem;
            color: #333;
        }
        
        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .car-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .car-image {
            height: 180px;
            position: relative;
        }
        
        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .car-tag {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #4108ec;
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 3px;
            font-size: 0.8rem;
        }
        
        .car-info {
            padding: 1rem;
        }
        
        .car-name {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .car-price {
            color: #4108ec;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .car-price span {
            color: #888;
            font-size: 0.9rem;
            font-weight: 400;
        }
        
        .car-features {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .feature {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .feature i {
            color: #888;
            margin-bottom: 0.2rem;
        }
        
        .feature span {
            font-size: 0.8rem;
            color: #888;
        }
        
        .car-card .btn {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        /* Locations Section */
        .locations {
            padding: 3rem 5%;
            background-color: #f8f8f8;
        }
        
        .location-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .location-card {
            position: relative;
            height: 200px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }
        
        .location-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .location-card:hover img {
            transform: scale(1.1);
        }
        
        .location-name {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            color: white;
            padding: 1rem;
            font-weight: 600;
        }
        
        /* How It Works Section */
        .how-it-works {
            padding: 3rem 5%;
            background-color: #f5f5f5;
        }
        
        .process-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .process-item {
            flex: 1;
            min-width: 200px;
            text-align: center;
            padding: 1.5rem;
        }
        
        .process-icon {
            width: 80px;
            height: 80px;
            background-color: #4108ec;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 1.5rem;
        }
        
        .process-icon i {
            font-size: 30px;
            color: white;
        }
        
        .process-item h3 {
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .process-item p {
            color: #777;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Footer Updated Styles */
        footer {
            background-color: #1a1a1a;
            color: white;
            padding: 3rem 5% 1rem;
        }
        
        .footer-top {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 2rem;
        }
        
        .footer-logo {
            flex: 0 0 100%;
            max-width: 400px;
            margin-bottom: 2rem;
        }
        
        .footer-logo h2 {
            margin: 1rem 0;
        }
        
        .footer-logo p {
            color: #aaa;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background-color: #333;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            transition: background-color 0.3s, transform 0.3s;
        }
        
        .social-icon:hover {
            background-color: #4108ec;
            transform: translateY(-3px);
        }
        
        .footer-newsletter {
            flex: 0 0 100%;
            max-width: 400px;
        }
        
        .footer-newsletter h3 {
            margin-bottom: 1.5rem;
        }
        
        .newsletter-form {
            display: flex;
            max-width: 100%;
        }
        
        .newsletter-form input {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            border-radius: 4px 0 0 4px;
            font-size: 0.9rem;
        }
        
        .newsletter-form .btn {
            border-radius: 0 4px 4px 0;
            font-size: 0.9rem;
        }
        
        .footer-divider {
            height: 1px;
            background-color: #333;
            margin: 2rem 0;
        }
        
        .footer-nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        
        .footer-nav-column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 2rem;
        }
        
        .footer-nav-column h4 {
            color: white;
            margin-bottom: 1.2rem;
            font-size: 1.1rem;
        }
        
        .footer-nav-column ul {
            list-style: none;
        }
        
        .footer-nav-column ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-nav-column ul li a,
        .footer-nav-column ul li {
            color: #aaa;
            transition: color 0.3s;
        }
        
        .footer-nav-column ul li a:hover {
            color: #4108ec;
        }
        
        .footer-nav-column i {
            width: 20px;
            margin-right: 10px;
            color: #4108ec;
        }
        
        .copyright {
            text-align: center;
            padding: 1.5rem 0;
            color: #777;
            font-size: 0.9rem;
        }
        
        .copyright a {
            color: #4108ec;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            header {
                padding: 1rem 3%;
            }
            
            nav ul {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .stats {
                flex-wrap: wrap;
            }
            
            .stat-item {
                width: 50%;
                margin-bottom: 1.5rem;
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
            <img src="https://imgcdn.oto.com/medium/gallery/exterior/7/2234/daihatsu-sigra-95867.jpg" alt="RentalPartner Logo">
            <h2>Rental Partner</h2>
        </div>
        <nav>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">OUR SERVICES</a></li>
                <li><a href="#">PLACES</a></li>
                <li><a href="#">CONTACT US</a></li>
            </ul>
        </nav>
        <a href="{{route('login')}}" class="btn">LOGIN NOW</a>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Explore the Road Ahead with <span>Rental Partner</span> Rentals</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam felis non lorem gravida vehicula.</p>
            <a href="#" class="btn">VIEW OUR FLEET</a>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stat-item">
            <div class="stat-number">10+</div>
            <div class="stat-label">Years of Experience</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">1000+</div>
            <div class="stat-label">Happy Clients</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">200+</div>
            <div class="stat-label">Vehicles</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">10+</div>
            <div class="stat-label">Locations</div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="featured">
        <div class="section-header">
            <h2 class="section-title">Featured Cars</h2>
            <a href="#" class="btn">SHOW ALL</a>
        </div>
        <div class="car-grid">
            <!-- Car Card 1 -->
            <div class="car-card">
                <div class="car-image">
                    <img src="/api/placeholder/300/200" alt="Porsche Cayenne Coupe">
                    <div class="car-tag">HOT</div>
                </div>
                <div class="car-info">
                    <h3 class="car-name">Porsche Cayenne Coupe</h3>
                    <div class="car-price">$500 <span>/day</span></div>
                    <div class="car-features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <span>2023</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cog"></i>
                            <span>Automatic</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-gas-pump"></i>
                            <span>Petrol</span>
                        </div>
                    </div>
                    <a href="#" class="btn">RENT THIS VEHICLE</a>
                </div>
            </div>
            
            <!-- Car Card 2 -->
            <div class="car-card">
                <div class="car-image">
                    <img src="/api/placeholder/300/200" alt="BMW M5 Competition">
                    <div class="car-tag">NEW</div>
                </div>
                <div class="car-info">
                    <h3 class="car-name">BMW M5 Competition</h3>
                    <div class="car-price">$350 <span>/day</span></div>
                    <div class="car-features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <span>2023</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cog"></i>
                            <span>Automatic</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-gas-pump"></i>
                            <span>Petrol</span>
                        </div>
                    </div>
                    <a href="#" class="btn">RENT THIS VEHICLE</a>
                </div>
            </div>
            
            <!-- Car Card 3 -->
            <div class="car-card">
                <div class="car-image">
                    <img src="/api/placeholder/300/200" alt="Ferrari 458">
                    <div class="car-tag">HOT</div>
                </div>
                <div class="car-info">
                    <h3 class="car-name">Ferrari 458</h3>
                    <div class="car-price">$700 <span>/day</span></div>
                    <div class="car-features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <span>2023</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cog"></i>
                            <span>Automatic</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-gas-pump"></i>
                            <span>Petrol</span>
                        </div>
                    </div>
                    <a href="#" class="btn">RENT THIS VEHICLE</a>
                </div>
            </div>
            
            <!-- Car Card 4 -->
            <div class="car-card">
                <div class="car-image">
                    <img src="/api/placeholder/300/200" alt="Porsche 911">
                    <div class="car-tag">NEW</div>
                </div>
                <div class="car-info">
                    <h3 class="car-name">Porsche 911</h3>
                    <div class="car-price">$550 <span>/day</span></div>
                    <div class="car-features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <span>2023</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cog"></i>
                            <span>Automatic</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-gas-pump"></i>
                            <span>Petrol</span>
                        </div>
                    </div>
                    <a href="#" class="btn">RENT THIS VEHICLE</a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="process-container">
            <div class="process-item">
                <div class="process-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>Browse Our Fleet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
            </div>
            
            <div class="process-item">
                <div class="process-icon">
                    <i class="fas fa-car"></i>
                </div>
                <h3>Select Your Vehicle</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
            </div>
            
            <div class="process-item">
                <div class="process-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3>Submit an Enquiry</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
            </div>
            
            <div class="process-item">
                <div class="process-icon">
                    <i class="fas fa-key"></i>
                </div>
                <h3>Pick Up & Drive</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
            </div>
        </div>
    </section>

    <!-- Locations Section -->
    <section class="locations">
        <div class="section-header">
            <h2 class="section-title">Our Locations</h2>
        </div>
        <div class="location-grid">
            <!-- Location 1 -->
            <div class="location-card">
                <img src="/api/placeholder/300/200" alt="Dubai">
                <div class="location-name">Dubai, Emirates</div>
            </div>
            
            <!-- Location 2 -->
            <div class="location-card">
                <img src="/api/placeholder/300/200" alt="Paris">
                <div class="location-name">Paris, France</div>
            </div>
            
            <!-- Location 3 -->
            <div class="location-card">
                <img src="/api/placeholder/300/200" alt="Manhattan">
                <div class="location-name">Manhattan, Dubai</div>
            </div>
            
            <!-- Location 4 -->
            <div class="location-card">
                <img src="/api/placeholder/300/200" alt="Miami">
                <div class="location-name">Miami, United States</div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-top">
            <div class="footer-logo">
                <img src="/api/placeholder/150/50" alt="GearShift Logo">
                <h2>Rental Partner</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam justo nec ligula eleifend efficitur.</p>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="footer-newsletter">
                <h3>Subscribe to our newsletter</h3>
                <div class="newsletter-form">
                    <input type="email" placeholder="example@gearshift.com">
                    <button type="submit" class="btn">SUBMIT</button>
                </div>
            </div>
        </div>
        
        <div class="footer-divider"></div>
        
        <div class="footer-nav">
            <div class="footer-nav-column">
                <h4>Pages</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Our Fleet</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-nav-column">
                <h4>Template Pages</h4>
                <ul>
                    <li><a href="#">Cars Template</a></li>
                    <li><a href="#">Car Types Template</a></li>
                    <li><a href="#">Car Locations Template</a></li>
                    <li><a href="#">Car Brands Template</a></li>
                    <li><a href="#">Features Template</a></li>
                </ul>
            </div>
            
            <div class="footer-nav-column">
                <h4>Utility Pages</h4>
                <ul>
                    <li><a href="#">Password Protected</a></li>
                    <li><a href="#">404 Not Found</a></li>
                    <li><a href="#">Style Guide</a></li>
                    <li><a href="#">Licenses</a></li>
                    <li><a href="#">Changelog</a></li>
                    <li><a href="#">Instructions</a></li>
                </ul>
            </div>
            
            <div class="footer-nav-column">
                <h4>Get In Touch</h4>
                <ul>
                    <li><i class="fas fa-phone"></i> +971 12 345 6789</li>
                    <li><i class="fas fa-envelope"></i> info@gearshift.ae</li>
                    <li><i class="fas fa-map-marker-alt"></i> 123 Innovation Street, Downtown Dubai, Dubai, UAE</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-divider"></div>
        
        <div class="copyright">
            <p>Copyright © Rental Partner | Powered by <a href="#">Webflow</a> | Designed by <a href="#">AM Templates</a></p>
        </div>
    </footer>

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
</body>
</html>