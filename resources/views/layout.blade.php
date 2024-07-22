<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include CSS files here -->
</head>
<body>
    @include('header') <!-- Include the header -->
    <main>
        @yield('content') <!-- Content will be injected here -->
    </main>
    @include('footer') <!-- Include the footer -->
</body>
</html>
