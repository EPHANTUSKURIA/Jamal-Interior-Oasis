<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .search-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .search-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="search-container">
        <div class="search-header">
            <h1>Search Products</h1>
        </div>
        <form action="{{ route('search.results') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" id="query" name="query" placeholder="Enter product name or description" required>
            </div>
            <div class="form-group">
                <button type="submit">Search</button>
            </div>
        </form>
    </main>

    @include('footer')
</body>
</html>
