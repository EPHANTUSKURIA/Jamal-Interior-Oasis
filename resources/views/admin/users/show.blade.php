<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User - Admin Dashboard</title>
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
        .user-info {
            margin-bottom: 20px;
        }
        .user-info label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .user-info p {
            margin: 0;
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
        .btn-back {
            background: #D76F30;
        }
        .btn-back:hover {
            background: #6BB77B;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>User Details</h1>
        </header>

        <nav class="navbar">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.orders.index') }}">Orders</a>
            <a href="{{ route('admin.products.index') }}">Products</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <a href="{{ route('admin.reports.sales') }}">Reports</a>
        </nav>

        <div class="card">
            <h2>Details for User #{{ $user->id }}</h2>

            <div class="user-info">
                <label>Name</label>
                <p>{{ $user->name }}</p>
            </div>
            <div class="user-info">
                <label>Email</label>
                <p>{{ $user->email }}</p>
            </div>
            <div class="user-info">
                <label>Role</label>
                <p>{{ $user->role }}</p>
            </div>

            <a href="{{ route('admin.users.index') }}" class="btn btn-back">Back to Users List</a>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
