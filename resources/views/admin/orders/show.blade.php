<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Admin Dashboard</title>
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
        .card table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .card table, th, td {
            border: 1px solid #ddd;
        }
        .card th, .card td {
            padding: 10px;
            text-align: left;
        }
        .card th {
            background: #D76F30;
            color: #fff;
        }
        .card tr:nth-child(even) {
            background: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            color: #fff;
            background: #172D13;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background: #6BB77B;
        }
        .order-info {
            margin-bottom: 20px;
        }
        .order-info p {
            font-size: 16px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Order Details</h1>
        </header>

        <nav class="navbar">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.orders.index') }}">Orders</a>
            <a href="{{ route('admin.products.index') }}">Products</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <a href="{{ route('admin.reports.sales') }}">Reports</a>
        </nav>

        <div class="card">
            <h2>Order #{{ $order->id }}</h2>
            <div class="order-info">
                <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
            </div>

            <h3>Ordered Items</h3>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if($order->items && $order->items->count())
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td> <!-- Ensure product relationship is correctly set -->
            <td>{{ $item->quantity }}</td>
            <td>Ksh {{ number_format($item->price, 2) }}</td> <!-- Change $ to Ksh -->
            <td>Ksh {{ number_format($item->quantity * $item->price, 2) }}</td> <!-- Change $ to Ksh -->
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4">No items found.</td>
    </tr>
@endif

                
                </tbody>
            </table>

            <a href="{{ route('admin.orders.index') }}" class="btn">Back to Orders</a>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
