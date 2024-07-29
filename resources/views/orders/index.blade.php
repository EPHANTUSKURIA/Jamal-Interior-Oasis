<!DOCTYPE html>
<html>
<head>
    <title>Your Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
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
        .order-list {
            margin-top: 20px;
        }
        .order-list table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .order-list th, .order-list td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .order-list th {
            background-color: #D76F30;
            color: #fff;
        }
        .order-list td {
            text-align: center;
        }
        .order-list .details {
            cursor: pointer;
            color: #6BB77B;
        }
        .order-list .details:hover {
            text-decoration: underline;
        }
        .order-list .status {
            font-weight: bold;
        }
        .order-summary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Orders</h1>
        </div>
        <div class="order-list">
            <table>
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td class="status">{{ ucfirst($order->status) }}</td>
                            <td>
                                <a href="{{ route('orders.index', $order->id) }}" class="details">View Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">You have no orders yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

