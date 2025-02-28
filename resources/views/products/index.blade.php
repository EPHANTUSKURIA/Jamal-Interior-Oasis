<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: #f8f9fa;
            color: #333;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #172D13; /* Dark Green */
            text-transform: uppercase;
            font-size: 36px;
            letter-spacing: 1.2px;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 0 15px;
        }
        .product-item {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: calc(25% - 20px);
            box-sizing: border-box;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
        }
        .product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .product-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #e9ecef;
        }
        .product-info {
            padding: 15px;
            text-align: center;
            flex-grow: 1;
        }
        .product-info h3 {
            margin: 0;
            font-size: 20px;
            color: #172D13; /* Dark Green */
            font-weight: bold;
        }
        .product-info p {
            color: #666;
            font-size: 14px;
            margin: 10px 0;
        }
        .price {
            font-size: 22px;
            color: #D76F30; /* Orange */
            margin-top: 10px;
            font-weight: bold;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #6BB77B; /* Light Green */
            color: white;
            text-align: center;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #172D13; /* Dark Green */
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
                        <div class="price">Ksh {{ number_format($product->price, 2) }}</div>
                        <a href="{{ route('products.show', $product->id) }}" class="btn">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    @include('footer')
</body>
</html>
