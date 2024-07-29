<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
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
        .logout-button {
            text-align: center;
            margin-top: 20px;
        }
        .logout-button form button {
            background-color: #d9534f;
            color: #fff;
        }
        .logout-button form button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    @include('header')

    <main class="account-container">
        <div class="account-header">
            <h1>My Account</h1>
            <p>Manage your personal information.</p>
        </div>

        <div class="account-form">
            <form action="{{ route('account.updateProfile') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="form-group">
                    <button type="submit">Update Profile</button>
                </div>
            </form>
        </div>

        <div class="logout-button">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </main>

    @include('footer')
</body>
</html>
