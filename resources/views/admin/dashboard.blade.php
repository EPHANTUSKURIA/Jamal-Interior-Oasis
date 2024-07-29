<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jamal Interior Oasis</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        header {
            background-color: #172D13;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            background-color: #D76F30;
            width: 250px;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar h2 {
            color: white;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 0;
            display: block;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        .dashboard-card {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card h3 {
            margin-top: 0;
            color: #172D13;
        }
        .card-links a {
            display: block;
            color: #D76F30;
            text-decoration: none;
            margin: 5px 0;
        }
        .card-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard - Jamal Interior Oasis</h1>
    </header>
    <div class="container">
        <div class="sidebar">
            <div>
                <h2>Navigation</h2>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.orders.index') }}">Order Management</a>
                <a href="{{ route('admin.users.index') }}">User Management</a>
                <a href="{{ route('admin.products.index') }}">Product Management</a>
                <a href="{{ route('admin.reports.sales') }}">Reports and Analytics</a>
            </div>
            <div>
                <a href="{{ route('admin.logout') }}">Logout</a>
            </div>
        </div>
        <div class="main-content">
            <div class="dashboard-card">
                <h3>Overview</h3>
                <p>Welcome to the admin dashboard. Here you can manage various aspects of the application.</p>
                <ul>
                    <li>Total Products: {{ $totalProducts }}</li>
                    <li>Total Orders: {{ $totalOrders }}</li>
                    <li>Total Users: {{ $totalUsers }}</li>
                </ul>
            </div>

            <div class="dashboard-card">
                <h3>Order Management</h3>
                <div class="card-links">
                    <a href="{{ route('admin.orders.index') }}">View All Orders</a>
                    <a href="{{ route('admin.orders.show', ['id' => 'pending']) }}">View Pending Orders</a>
                    <a href="{{ route('admin.orders.show', ['id' => 'completed']) }}">View Completed Orders</a>
                </div>
            </div>

            <div class="dashboard-card">
                <h3>User Management</h3>
                <div class="card-links">
                    <a href="{{ route('admin.users.index') }}">View All Users</a>
                    <a href="{{ route('admin.users.show', ['id' => 'create']) }}">Add New User</a>
                </div>
            </div>

            <div class="dashboard-card">
                <h3>Product Management</h3>
                <div class="card-links">
                    <a href="{{ route('admin.products.index') }}">View All Products</a>
                    <a href="{{ route('admin.products.create') }}">Add New Product</a>
                </div>
            </div>

            <div class="dashboard-card">
                <h3>Reports and Analytics</h3>
                <div class="card-links">
                    <a href="{{ route('admin.reports.sales') }}">View Sales Reports</a>
                    <a href="{{ route('admin.reports.users') }}">User Statistics</a>
                    <a href="{{ route('admin.reports.products') }}">Product Statistics</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
