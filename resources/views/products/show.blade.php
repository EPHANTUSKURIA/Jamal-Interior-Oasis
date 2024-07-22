<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .product-detail {
            display: flex;
            gap: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .product-detail img {
            width: 50%;
            height: auto;
            border-radius: 8px;
        }
        .product-info {
            max-width: 50%;
        }
        .product-info h1 {
            font-size: 28px;
            color: #333;
        }
        .product-info p {
            font-size: 18px;
            color: #666;
            margin: 15px 0;
        }
        .product-info .price {
            font-size: 24px;
            color: #007bff;
            margin: 15px 0;
        }
        .product-info .btn {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-align: center;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .product-info .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <main class="container">
        <div class="product-detail">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <div class="price">${{ number_format($product->price, 2) }}</div>
                <a href="{{ route('cart.add', $product->id) }}" class="btn">Add to Cart</a>
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
