<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #D76F30;
        }
        .header h1 {
            color: #172D13;
        }
        .cart-items {
            margin-top: 20px;
        }
        .cart-items table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .cart-items th, .cart-items td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .cart-items th {
            background-color: #D76F30;
            color: #fff;
        }
        .cart-items td {
            text-align: center;
        }
        .cart-items img {
            max-width: 50px;
            max-height: 50px;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
        .buttons {
            text-align: right;
        }
        .buttons a, .buttons button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            background-color: #6BB77B;
            color: #fff;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .buttons a:hover, .buttons button:hover {
            background-color: #172D13;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Shopping Cart</h1>
        </div>
        <div class="cart-items">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $id => $item)
                        <tr>
                            <td>
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                                <p>{{ $item['name'] }}</p>
                            </td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Your cart is empty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="total">
            <p>Total: ${{ number_format($total, 2) }}</p>
        </div>
        <div class="buttons">
            <a href="{{ route('products.index') }}">Continue Shopping</a>
            @if (!empty($cart))
                <a href="{{ route('cart.checkout') }}">Checkout</a>
            @endif
        </div>
    </div>
</body>
</html>
