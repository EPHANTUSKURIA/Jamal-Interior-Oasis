<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jamal Interior Oasis</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .dashboard-container {
            margin: 20px;
        }
        .dashboard-card {
            background-color: #f8f9fa;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card h3 {
            margin-top: 0;
        }
        .card-links a {
            display: block;
            color: #007bff;
            text-decoration: none;
            margin: 5px 0;
        }
        .card-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>

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
                <!-- Assuming these routes are available for pending and completed orders -->
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
                <!-- Assuming these report routes are available -->
                <a href="{{ route('admin.reports.sales') }}">View Sales Reports</a>
                <a href="{{ route('admin.reports.users') }}">User Statistics</a>
                <a href="{{ route('admin.reports.products') }}">Product Statistics</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
