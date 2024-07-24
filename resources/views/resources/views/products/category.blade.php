<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categoryName }} - Jamal Interior Oasis</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .category-header {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        .category-header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 20px;
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
        <!-- Category Header Section -->
        <section class="category-header">
            <h1>{{ $categoryName }} - Products</h1>
        </section>

        <!-- Products Grid Section -->
        <section>
            <div class="container">
                <h2 class="text-center mb-4">Available Products</h2>
                <div class="product-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
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
        <p>&copy; {{ date('Y') }} Jamal Interior Oasis. All rights reserved.</p>
    </footer>
</body>
</html>
