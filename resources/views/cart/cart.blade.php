<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .cart-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .cart-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .cart-header h1 {
            font-size: 32px;
            color: #172D13; /* Dark Green */
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .cart-table th {
            background-color: #f4f4f4;
            color: #172D13; /* Dark Green */
        }
        .cart-table img {
            max-width: 100px;
            height: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group button {
            background-color: #D76F30; /* Orange */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #C15C2D; /* Darker Orange */
        }
        .form-group a.btn-success {
            background-color: #6BB77B; /* Light Green */
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
        }
        .form-group a.btn-success:hover {
            background-color: #5A9B6E; /* Darker Light Green */
        }
        .total-price {
            font-size: 24px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
            color: #172D13; /* Dark Green */
        }
        .btn-danger {
            background-color: #D76F30; /* Orange */
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger:hover {
            background-color: #C15C2D; /* Darker Orange */
        }
    </style>
</head>
<body>
    @include('header')

    <main class="cart-container">
        <div class="cart-header">
            <h1>Your Shopping Cart</h1>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $item)
                            <tr>
                                <td>
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                </td>
                                <td>{{ $item['name'] }}</td>
                                <td>Ksh {{ number_format($item['price'], 2) }}</td>
                                <td>
                                    <input type="number" name="quantity[{{ $id }}]" value="{{ $item['quantity'] }}" min="1" style="width: 60px;">
                                </td>
                                <td>Ksh {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.destroy', $id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total-price">
                    Total: Ksh {{ number_format($total, 2) }}
                </div>

                <div class="form-group">
                    <button type="submit">Update Cart</button>
                </div>
            </form>

            <div class="form-group">
                <a href="{{ route('checkout.index') }}" class="btn-success">Proceed to Checkout</a>
            </div>
        @else
            <p>Your cart is currently empty.</p>
        @endif
    </main>

    @include('footer')
</body>
</html>
