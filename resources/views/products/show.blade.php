<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
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
            display: inline-block;
        }
        .product-info .btn:hover {
            background: #0056b3;
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

