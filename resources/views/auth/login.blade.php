<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/pages/login.css', 'resources/css/base/variables.css', 'resources/css/assets/RemixIcon/fonts/remixicon.css','resources/js/app.js'])
    <title>LMS Login</title>
</head>

<body>
    <div class="login-box">
        <div class="login-banner">
            <div class="title">
                <h1>Lam's</h1>
                <p class="subtitle">Library Management System</p>
            </div>
            <div class="media-link">
                <p><a href="https://instagram.com/tauwfiik"><i class="ri-instagram-line"></i> Instagram</a> <a
                        href="https://github.com/taufikhdy/taufikhdy"><i class="ri-github-fill"></i> github</a></p>
            </div>
        </div>
        <div class="form-box">
            <h1>Login</h1>
            <p class="caption">Login untuk menggunakan aplikasi</p>

            <form method="POST" action="{{ route('authenticate') }}">
                @csrf
                <div class="input-login">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="input-login">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                @if (session('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif

                <input type="submit" name="" id="" value="Login" class="login">

                <div class="form-link">
                    <p><a href="https://instagram.com/tauwfiik"><i class="ri-instagram-line"></i> Instagram</a> <a
                            href="https://github.com/taufikhdy/taufikhdy"><i class="ri-github-fill"></i> github</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
