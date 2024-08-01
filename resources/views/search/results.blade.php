<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .results-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .results-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product-card h3 {
            margin-top: 0;
        }
        .product-card p {
            margin: 0;
        }
        .product-card .price {
            font-size: 18px;
            color: #007bff;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="results-container">
        <div class="results-header">
            <h1>Search Results for "{{ $query }}"</h1>
        </div>
        @if($products->isEmpty())
            <p>No products found matching your query.</p>
        @else
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p class="price">Price: ${{ $product->price }}</p>
                </div>
            @endforeach
        @endif
    </main>

    @include('footer')
</body>
</html>
