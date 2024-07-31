<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
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
        .order-details {
            margin-top: 20px;
        }
        .order-details h2 {
            color: #172D13;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .order-details th, .order-details td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .order-details th {
            background-color: #D76F30;
            color: #fff;
        }
        .order-details td {
            text-align: center;
        }
        .button {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #6BB77B;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #172D13;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Your Order!</h1>
            <p>Your order has been successfully placed and is being processed.</p>
            <p>Delivery Option: {{ $order->delivery_option }}</p>
            <p>Delivery Location: {{ $order->delivery_location }}</p>
        </div>

        <div class="order-details">
            <h2>Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $OrderItem)
                        <tr>
                           <td>{{ $OrderItem->product->name }}</td>
                           <td>Ksh {{ number_format($OrderItem->price, 2) }}</td>
                           <td>{{ $OrderItem->quantity }}</td>
                           <td>Ksh {{ number_format($OrderItem->price * $OrderItem->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3>Order Summary</h3>
            <p>Subtotal: Ksh {{ number_format($order->subtotal, 2) }}</p>
            <p>Shipping Cost: Ksh {{ number_format($order->shipping_cost, 2) }}</p>
            <p>Total: Ksh {{ number_format($order->total, 2) }}</p>
        </div>
        <a href="{{ route('home') }}" class="button">Continue Shopping</a>
    </div>
</body>
</html>

