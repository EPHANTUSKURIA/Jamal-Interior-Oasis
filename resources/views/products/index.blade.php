<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product-item {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .product-item img {
            width: 100%;
            height: auto;
        }
        .product-item .product-info {
            padding: 15px;
        }
        .product-item h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        .product-item p {
            color: #666;
        }
        .product-item .price {
            font-size: 20px;
            color: #007bff;
            margin-top: 10px;
        }
        .product-item .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            text-align: center;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .product-item .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="container my-4">
        <h1>Our Products</h1>
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-item">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <div class="price">${{ number_format($product->price, 2) }}</div>
                        <a href="{{ route('products.show', $product->id) }}" class="btn">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    @include('footer')
</body>
</html>
