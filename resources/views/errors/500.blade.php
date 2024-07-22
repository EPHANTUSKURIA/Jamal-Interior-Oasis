<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }
        .error-container {
            max-width: 600px;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .error-container h1 {
            font-size: 100px;
            margin: 0;
            color: #dc3545;
        }
        .error-container h2 {
            margin: 0;
            font-size: 24px;
            color: #343a40;
        }
        .error-container p {
            margin-top: 10px;
            font-size: 16px;
            color: #6c757d;
        }
        .error-container a {
            color: #007bff;
            text-decoration: none;
        }
        .error-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>500</h1>
        <h2>Internal Server Error</h2>
        <p>Something went wrong on our end. <a href="{{ route('home') }}">Go back to home page</a>.</p>
    </div>
</body>
</html>
