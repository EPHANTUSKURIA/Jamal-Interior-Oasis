<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS and custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .login-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h1 {
            font-size: 32px;
            color: #172D13;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #D76F30;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #B65C1E;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="login-container">
        <div class="login-header">
            <h1>Login</h1>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="@error('email') border-red-500 @enderror">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required
                       class="@error('password') border-red-500 @enderror">
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit">Login</button>
                @if (Route::has('password.request'))
                <a class="text-sm text-dark-green hover:underline" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
                @endif
            </div>
        </form>

        <div class="text-center mt-4">
            <p>Don't have an account? <a href="{{ route('register') }}" class="text-orange-500 hover:underline">Register</a></p>
        </div>
    </main>

    @include('footer')
</body>
</html>
