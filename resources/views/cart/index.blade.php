<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .cart-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .cart-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .cart-header h1 {
            font-size: 32px;
            color: #172D13;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .cart-table th {
            background-color: #f4f4f4;
        }
        .total-price {
            font-size: 24px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <main class="cart-container">
        <div class="cart-header">
            <h1>Your Cart</h1>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
            <table class="cart-table">
                <thead>
                    <tr>
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
                            <td>{{ $item['name'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="total-price">
                Total: ${{ number_format($total, 2) }}
            </div>

            <a href="{{ route('cart.checkout') }}" class="button">Proceed to Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </main>

    @include('layouts.footer')
</body>
</html>
