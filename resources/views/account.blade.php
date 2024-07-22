<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .account-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .account-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .account-header h1 {
            font-size: 32px;
            color: #333;
        }
        .account-header p {
            font-size: 18px;
            color: #666;
        }
        .account-form {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .order-history {
            margin-top: 30px;
        }
        .order-history h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .order-history table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-history th, .order-history td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .order-history th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <main class="account-container">
        <div class="account-header">
            <h1>My Account</h1>
            <p>Manage your personal information and view your order history.</p>
        </div>

        <div class="account-form">
            <form action="{{ route('account.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div class="form-group">
                    <button type="submit">Update Profile</button>
                </div>
            </form>
        </div>

        <div class="order-history">
            <h2>Order History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
