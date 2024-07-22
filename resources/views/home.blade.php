<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Jamal Interior Oasis</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .hero-section {
            background: url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
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
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .hero-section a:hover {
            background-color: #0056b3;
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
        .footer-section {
            background-color: #f8f9fa;
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
    </style>
</head>
<body>
    @include('layouts.header')

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <h1>Welcome to Jamal Interior Oasis</h1>
            <p>Your destination for exquisite furniture and interior design.</p>
            <a href="{{ route('products.index') }}">Shop Now</a>
        </section>

        <!-- Featured Products Section -->
        <section>
            <div class="container">
                <h2 class="text-center mb-4">Featured Products</h2>
                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
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

    <footer class="footer-section">
        <!-- About Us Section -->
        <section>
            <h3>About Us</h3>
            <p>We are Jamal Interior Oasis, committed to providing high-quality furniture and interior design services. Our mission is to transform your living spaces into beautiful and functional environments.</p>
        </section>

        <!-- Testimonials Section -->
        <section>
            <h3>Testimonials</h3>
            @foreach($testimonials as $testimonial)
                <p class="testimonial-item">"{{ $testimonial->content }}" - {{ $testimonial->author }}</p>
            @endforeach
        </section>

        <!-- Locations Section -->
        <section>
            <h3>Our Locations</h3>
            @foreach($locations as $location)
                <p class="location-item">{{ $location->address }} - {{ $location->city }}, {{ $location->state }}</p>
            @endforeach
        </section>

        <p>&copy; {{ date('Y') }} Jamal Interior Oasis. All rights reserved.</p>
    </footer>

    @include('layouts.footer')
</body>
</html>
