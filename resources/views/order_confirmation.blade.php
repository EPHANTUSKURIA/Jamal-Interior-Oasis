<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Jamal Interior Oasis</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .confirmation-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .confirmation-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .confirmation-header h1 {
            font-size: 36px;
            color: #007bff;
        }
        .order-details {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .order-details h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .order-details p {
            font-size: 16px;
            margin: 10px 0;
        }
        .order-summary {
            margin-top: 20px;
        }
        .order-summary table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-summary table th, .order-summary table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .order-summary table th {
            background-color: #007bff;
            color: #fff;
        }
        .order-summary table td {
            background-color: #f9f9f9;
        }
        .thank-you-message {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="confirmation-container">
        <div class="confirmation-header">
            <h1>Order Confirmation</h1>
        </div>

        <div class="order-details">
            <h2>Thank you for your purchase!</h2>
            <p>Order Number: <strong>{{ $order->id }}</strong></p>
            <p>Order Date: <strong>{{ $order->created_at->format('F j, Y') }}</strong></p>
            <p>Shipping Address: <strong>{{ $order->shipping_address }}</strong></p>
        </div>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: bold;">Subtotal</td>
                        <td>${{ number_format($order->subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: bold;">Shipping</td>
                        <td>${{ number_format($order->shipping_cost, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: bold;">Total</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="thank-you-message">
            <p>We appreciate your business. You will receive an email confirmation shortly with the details of your order.</p>
            <p>If you have any questions or need further assistance, feel free to <a href="{{ route('contact') }}">contact us</a>.</p>
        </div>
    </main>

    @include('footer')
</body>
</html>
