<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categoryName }} Products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 1200px;
        }
        .category-header {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #6BB77B;
            color: white;
            border-radius: 8px;
        }
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
            width: calc(20% - 20px);
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }
        .product-item:hover {
            transform: scale(1.05);
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
            color: #D76F30;
            margin-top: 10px;
        }
        .product-item .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #D76F30;
            color: white;
            text-align: center;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .product-item .btn:hover {
            background: #B65A1E;
        }
        .no-items {
            padding: 20px;
            background-color: #FFF3F3;
            color: #D76F30;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('header')

    <div class="container">
        <div class="category-header">
            <h1>{{ $categoryName }} Products</h1>
        </div>

        @if ($products->isEmpty())
            <div class="no-items">
                <p>There are no products available in this category.</p>
            </div>
        @else
            <div class="product-list">
                @foreach ($products as $product)
                    <div class="product-item">
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}">
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                            <div class="price">Ksh{{ number_format($product->price, 2) }}</div>
                            <a href="{{ route('products.show', $product->id) }}" class="btn">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('footer')
</body>
</html>
