<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - Jamal Interior Oasis</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .wishlist-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        .wishlist-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .wishlist-header h1 {
            font-size: 36px;
            color: #007bff;
        }
        .wishlist-items {
            margin-top: 20px;
        }
        .wishlist-items .item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
        }
        .wishlist-items .item img {
            max-width: 150px;
            max-height: 150px;
            margin-right: 20px;
            border-radius: 8px;
        }
        .wishlist-items .item h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .wishlist-items .item p {
            font-size: 16px;
            margin: 10px 0;
            color: #555;
        }
        .wishlist-items .item a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .wishlist-items .item a:hover {
            text-decoration: underline;
        }
        .empty-wishlist {
            text-align: center;
            margin-top: 30px;
        }
        .empty-wishlist p {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="wishlist-container">
        <div class="wishlist-header">
            <h1>Your Wishlist</h1>
        </div>

        <div class="wishlist-items">
            @if($wishlistItems->isNotEmpty())
                @foreach($wishlistItems as $item)
                    <div class="item">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                        @else
                            <img src="{{ asset('images/default-product.png') }}" alt="Default Image">
                        @endif
                        <div>
                            <h2><a href="{{ route('products.show', $item->product->id) }}">{{ $item->product->name }}</a></h2>
                            <p>${{ number_format($item->product->price, 2) }}</p>
                            <p>{{ $item->product->description }}</p>
                            <a href="{{ route('products.show', $item->product->id) }}">View Details</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-wishlist">
                    <p>Your wishlist is currently empty.</p>
                </div>
            @endif
        </div>
    </main>

    @include('footer')
</body>
</html>
