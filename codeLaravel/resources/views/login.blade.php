<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="body-login">
        <div class="login-container">
            <h1>Đăng nhập Admin</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Nhập username" required>
                @error('username')
                    <div class="error-message">
                        <span style="color: red;">{{ $message }}</span>
                    </div>
                @enderror
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Nhập password" required>
                @error('password')
                    <div class="error-message">
                        <span style="color: red;">{{ $message }}</span>
                    </div>
                @enderror
                <button type="submit">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
</html>
