<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Jamal Interior Oasis</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #FDF5DF; /* Background color for the whole page */
        }
        .hero-section {
            background: url('{{ asset('images/CornerG.jpeg') }}') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 50px 20px; /* Reduced padding */
            position: relative;
        }
        .hero-section h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .hero-section a {
            color: white;
            background-color: #D76F30; /* Orange button color */
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .hero-section a:hover {
            background-color: #C55A24; /* Darker shade on hover */
        }
        .search-cart-categories {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: none;
        }
        .search-bar {
            flex-grow: 1;
            max-width: 400px;
            margin: 0 20px;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: none;
            border-radius: 5px;
        }
        .cart-tool a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            background-color: #D76F30; /* Orange button color */
            padding: 10px 20px;
            border-radius: 5px;
        }
        .cart-tool a:hover {
            background-color: #C55A24; /* Darker shade on hover */
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            font-weight: bold;
            font-size: 20px; /* Increased font size */
        }
        .sidebar ul li a:hover {
            text-decoration: underline;
        }
        .profile-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
        }
        .profile-icon a {
            color: white;
            text-decoration: none;
        }
        .profile-icon img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid white;
            cursor: pointer;
        }
        .hero-logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .hero-logo img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .footer-section {
            background-color: #FDF5DF;
            padding: 40px 20px;
            text-align: center;
        }
        .footer-section h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .footer-section p {
            margin: 10px 0;
            color: #333;
        }
        .footer-section .testimonial-item {
            margin: 10px 0;
            font-style: italic;
        }
        .footer-section .location-item {
            margin: 10px 0;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 250px;
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-card .product-info {
            padding: 15px;
        }
        .product-card .product-info h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-card .product-info p {
            color: #007bff;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .product-card .product-info a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .product-card .product-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <!-- Navigation bar content here -->
        </nav>
    </header>

    <main>
        <!-- Hero Section with Logo, Search, Cart, and Profile -->
        <section class="hero-section">
            <!-- Logo -->
            <div class="hero-logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Jamal Interior Oasis Logo">
            </div>
            
            <h1>Welcome to Jamal Interior Oasis</h1>
            <p>Your destination for exquisite furniture and interior design.</p>
            <a href="{{ route('products.index') }}">Shop Now</a>

            <!-- Search, Cart, and Categories -->
            <div class="search-cart-categories">
                <aside class="sidebar">
                    <ul>
                        <li><a href="{{ route('products.category', 'beds-mattresses') }}">Beds and Mattresses</a></li>
                        <li><a href="{{ route('products.category', 'dining-tables-chairs') }}">Dining Tables and Chairs</a></li>
                        <li><a href="{{ route('products.category', 'coffee-tables-side-tables') }}">Coffee Tables and Side Tables</a></li>
                        <li><a href="{{ route('products.category', 'office-furniture') }}">Office Furniture</a></li>
                    </ul>
                </aside>
                <div class="search-bar">
                    <input type="text" placeholder="Search for products...">
                </div>
                <div class="cart-tool">
                    <a href="{{ route('cart.index') }}">View Cart ({{ Cart::getContent()->count() }} items)</a>
                </div>
            </div>
        </section>

        <!-- Profile Icon -->
        <div class="profile-icon">
            <a href="{{ route('account.profile') }}">
                <img src="{{ asset('images/profilepic.jpg') }}" alt="Profile">
            </a>
        </div>

        <!-- Featured Products Section -->
        <section>
            <div class="container">
                <h2 class="text-center mb-4">Featured Products</h2>
                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <img src="{{ asset('images/Egg.jpeg') }}" alt="{{ $product->name }}">
                            <div class="product-info">
                                <h3>{{ $product->name }}</h3>
                                <p>${{ $product->price }}</p>
                                <a href="{{ route('products.show', $product->id) }}">View Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="footer-section">
        <section>
            <h3>About Us</h3>
            <p>Jamal Interior Oasis was founded in January 2017, initially located at Kahawest, Nairobi. Over the years, we have grown from one employee to now 15 employees, surviving various challenges and continuously innovating to meet our customers' needs. Our mission is to provide high-quality furniture and exceptional customer service, ensuring satisfaction in every interaction.</p>
            <p>Our dedication to quality and service has seen us evolve and expand, providing a wide range of furniture solutions for different needs. We pride ourselves on our craftsmanship, attention to detail, and commitment to creating beautiful and functional interior spaces for our clients.</p>
        </section>

        <section>
            <h3>Testimonials</h3>
            <p class="testimonial-item">"Jamal Interior Oasis provided excellent service. My package was delivered on time and in perfect condition. Highly recommended!" - Julius Mwangi</p>
        </section>

        <p>&copy; {{ date('Y') }} Jamal Interior Oasis. All rights reserved.</p>
    </footer>
</body>
</html>

