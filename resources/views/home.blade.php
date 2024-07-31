<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Jamal Interior Oasis</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #FDF5DF;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #172D13;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header-content {
            display: flex;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        .header-logo {
            max-width: 80px;
            height: auto;
            border-radius: 50%;
            border: 2px solid white;
        }
        nav {
            display: flex;
            gap: 20px;
            flex-grow: 1;
            justify-content: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            margin: 0 10px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .profile-icon img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid white;
            cursor: pointer;
        }
        .hero-section {
            background: url('{{ asset('images/CornerG.jpeg') }}') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 80px 20px;
            position: relative;
        }
        .hero-section h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }
        .hero-section p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .hero-section a.shop-now {
            color: white;
            background-color: #D76F30;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
        }
        .hero-section a.shop-now:hover {
            background-color: #C55A24;
        }
        .search-container {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }
        .search-bar {
            padding: 12px 20px;
            border-radius: 25px;
            border: 2px solid #D76F30;
            outline: none;
            font-size: 16px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }
        .search-bar:focus {
            border-color: #D76F30;
        }
        .cart-tool {
            position: absolute;
            bottom: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 16px;
        }
        .cart-icon {
            font-size: 24px;
            cursor: pointer;
        }
        .main-container {
            display: flex;
            flex: 1;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            gap: 20px;
        }
        .sidebar {
            width: 300px;
            padding: 15px;
            background-color: #FFF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            height: fit-content;
        }
        .sidebar h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #172D13;
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
            color: #172D13;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar ul li a:hover {
            background-color: #D76F30;
            color: #FFF;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-grid h2 {
            width: 100%;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #172D13;
        }
        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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
            font-size: 20px;
            margin: 10px 0;
            color: #172D13;
        }
        .product-card .product-info p {
            color: #D76F30;
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
        .footer-section {
            background-color: #172D13;
            padding: 40px 20px;
            color: white;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }
        .footer-content > div {
            flex: 1;
            padding: 0 20px;
            text-align: center;
            max-width: 300px;
        }
        .footer-content h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #D76F30;
        }
        .footer-content p {
            margin: 10px 0;
            color: #ddd;
        }
        .footer-content a {
            color: #D76F30;
            text-decoration: none;
        }
        .footer-content a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-content">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Jamal Interior Oasis Logo" class="header-logo">
            <nav>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('products.index') }}">Shop</a>
            </nav>
            <div class="profile-icon">
                <a href="{{ route('account.profile') }}">
                    <img src="{{ asset('images/profilepic.jpg') }}" alt="Profile">
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <h1>Welcome to Jamal Interior Oasis</h1>
            <p>Your destination for exquisite furniture and interior design.</p>
            <div class="search-container">
                <form action="{{ route('search.results') }}" method="GET">
                    <input type="text" name="query" class="search-bar" placeholder="Search products..." required>
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>
            <a href="{{ route('products.index') }}" class="shop-now">Shop Now</a>
            <div class="cart-tool">
                <i class="fa fa-shopping-cart cart-icon"></i>
                <a href="{{ route('cart.index') }}">View Cart ({{ Cart::getTotalQuantity() }})</a>
            </div>
        </section>

        <!-- Main Container -->
        <div class="main-container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <h2>Categories</h2>
                <ul>
                    <li><a href="{{ route('products.index', ['category' => 'living-room']) }}">Living Room Furniture</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'bedroom']) }}">Bedroom Furniture</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'dining-room']) }}">Dining Room Furniture</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'office']) }}">Office Furniture</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'outdoor']) }}">Outdoor Furniture</a></li>
                </ul>
            </aside>

            <!-- Content -->
            <div class="content">
                <!-- Product Grid -->
                <section class="product-grid">
                    <h2>Featured Products</h2>
                    @foreach($products as $product)
                        <div class="product-card">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            <div class="product-info">
                                <h3>{{ $product->name }}</h3>
                                <p>KES {{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('products.show', $product->id) }}">View Details</a>
                            </div>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="footer-section">
        <div class="footer-content">
            <div>
                <h3>About Us</h3>
                <p>Jamal Interior Oasis was founded in 2016 by Mr. John Maina, a visionary businessman who aimed to revolutionize the furniture industry. From our humble beginnings, we have grown from a single store to a thriving business with over 15 employees.</p>
            </div>
            <div>
                <h3>Testimonials</h3>
                <p>"Jamal Interior Oasis exceeded my expectations with their exceptional service and quality products. Highly recommended!" - Julius Mwangi</p>
            </div>
            <div>
                <h3>Contact Us</h3>
                <p>Email: johnsantex@gmail.com</p>
                <p>Phone: +254-703-821-823, +254-759-398-117</p>
            </div>
        </div>
    </footer>
</body>
</html>

