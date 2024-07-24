<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        .header {
            background: #172D13;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .navbar {
            background: #D76F30;
            padding: 10px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
        }
        .navbar a:hover {
            background: #6BB77B;
            border-radius: 5px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
        }
        .card h2 {
            margin-top: 0;
            color: #172D13;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            background: #172D13;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background: #6BB77B;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Edit Product</h1>
        </header>

        <nav class="navbar">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.orders.index') }}">Orders</a>
            <a href="{{ route('admin.products.index') }}">Products</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <a href="{{ route('admin.reports.sales') }}">Reports</a>
        </nav>

        <div class="card">
            <h2>Editing Product #{{ $product->id }}</h2>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" value="{{ $product->description }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="Living Room Furniture" {{ $product->category == 'Living Room Furniture' ? 'selected' : '' }}>Living Room Furniture</option>
                        <option value="Bedroom Furniture" {{ $product->category == 'Bedroom Furniture' ? 'selected' : '' }}>Bedroom Furniture</option>
                        <option value="Dining Room Furniture" {{ $product->category == 'Dining Room Furniture' ? 'selected' : '' }}>Dining Room Furniture</option>
                        <option value="Office Furniture" {{ $product->category == 'Office Furniture' ? 'selected' : '' }}>Office Furniture</option>
                        <option value="Outdoor Furniture" {{ $product->category == 'Outdoor Furniture' ? 'selected' : '' }}>Outdoor Furniture</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Update Product</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
