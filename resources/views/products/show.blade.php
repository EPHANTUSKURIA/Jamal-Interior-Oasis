<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: #f8f9fa;
            color: #333;
            font-family: Arial, sans-serif;
        }
        .product-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-detail img {
            flex: 1 1 50%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
        .product-info {
            flex: 1 1 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .product-info h1 {
            font-size: 32px;
            color: #172D13; /* Dark Green */
            margin-bottom: 20px;
        }
        .product-info p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .product-info .price {
            font-size: 24px;
            color: #D76F30; /* Orange */
            margin-bottom: 20px;
            font-weight: bold;
        }
        .product-info .btn {
            padding: 10px 20px;
            background: #6BB77B; /* Light Green */
            color: white;
            text-align: center;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background 0.3s;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
        }
        .product-info .btn:hover {
            background: #172D13; /* Dark Green */
        }
    </style>
</head>
<body>
    @include('header')

    <main class="container">
        <div class="product-detail">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <p>No image available</p>
            @endif
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <div class="price">Ksh {{ number_format($product->price, 2) }}</div>

                <!-- Form to add the product to the cart -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </main>

    @include('footer')
</body>
</html>
