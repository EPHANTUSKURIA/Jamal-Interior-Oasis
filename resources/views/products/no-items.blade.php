<!-- resources/views/products/no-items.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Items Found</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .no-items {
            text-align: center;
            margin-top: 50px;
        }
        .no-items h1 {
            font-size: 24px;
            color: #333;
        }
        .no-items p {
            font-size: 18px;
            color: #666;
        }
        .no-items a {
            display: inline-block;
            padding: 10px 20px;
            background: #6BB77B;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin-top: 20px;
        }
        .no-items a:hover {
            background: #5a9c63;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="container my-4 no-items">
        <h1>No Items Found</h1>
        <p>Sorry, there are no products available in this category at the moment.</p>
        <a href="{{ route('home') }}">Back to Home</a>
    </main>

    @include('footer')
</body>
</html>
