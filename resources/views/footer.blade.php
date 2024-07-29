<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Center the footer content */
        footer {
            text-align: center; /* Centers the text horizontally */
            padding: 20px; /* Adds some space around the text */
            background-color: #f1f1f1; /* Optional: Adds a background color to the footer */
            color: #333; /* Optional: Sets the text color */
            position: absolute; /* Ensures the footer stays at the bottom if the content is short */
            width: 100%; /* Makes sure the footer spans the full width of the page */
        }
    </style>
</head>
<body>
    <!-- Main content of the page -->
    <main>
        <!-- Your page content here -->
    </main>

    <!-- Footer content here -->
    <footer>
        <p>&copy; {{ date('Y') }} Jamal Interior Oasis. With You Every Step Of The Way.</p>
    </footer>
</body>
</html>

