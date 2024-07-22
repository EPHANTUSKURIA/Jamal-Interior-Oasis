<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .checkout-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .checkout-header h1 {
            font-size: 32px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
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
        }
        .total-price {
            font-size: 24px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
        }
        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <main class="checkout-container">
        <div class="checkout-header">
            <h1>Checkout</h1>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
            <form action="{{ route('order.store') }}" method="POST">
                @csrf

                <h2>Shipping Information</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}" required>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}" required>
                </div>

                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" value="{{ old('state') }}" required>
                </div>

                <div class="form-group">
                    <label for="zip">ZIP Code</label>
                    <input type="text" id="zip" name="zip" value="{{ old('zip') }}" required>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="{{ old('country') }}" required>
                </div>

                <h2>Order Summary</h2>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>${{ number_format($item['price'], 2) }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total-price">
                    Total: ${{ number_format($total, 2) }}
                </div>

                <div class="form-group">
                    <button type="submit">Place Order</button>
                </div>
            </form>
        @else
            <p>Your cart is empty. Please add items to your cart before proceeding to checkout.</p>
        @endif
    </main>

    @include('layouts.footer')
</body>
</html>
