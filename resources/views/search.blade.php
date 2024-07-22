<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Jamal Interior Oasis</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .search-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .search-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-header h1 {
            font-size: 36px;
            color: #007bff;
        }
        .search-results {
            margin-top: 20px;
        }
        .search-results .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
        }
        .search-results .product-item img {
            max-width: 150px;
            max-height: 150px;
            margin-right: 20px;
            border-radius: 8px;
        }
        .search-results .product-item h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }
        .search-results .product-item p {
            font-size: 16px;
            margin: 10px 0;
            color: #555;
        }
        .search-results .product-item a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .search-results .product-item a:hover {
            text-decoration: underline;
        }
        .no-results {
            text-align: center;
            margin-top: 30px;
        }
        .no-results p {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <main class="search-container">
        <div class="search-header">
            <h1>Search Results</h1>
            <p>Showing results for: <strong>{{ $query }}</strong></p>
        </div>

        <div class="search-results">
            @if($products->isNotEmpty())
                @foreach($products as $product)
                    <div class="product-item">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default-product.png') }}" alt="Default Image">
                        @endif
                        <div>
                            <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h2>
                            <p>${{ number_format($product->price, 2) }}</p>
                            <p>{{ $product->description }}</p>
                            <a href="{{ route('products.show', $product->id) }}">View Details</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-results">
                    <p>No products found matching your search.</p>
                </div>
            @endif
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
