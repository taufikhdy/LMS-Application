<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resource/css/app.css', 'resource/js/app.js'])
    <title>LMS Login</title>
</head>
<body>
    <div class="flex align-center justify-center w-100">
        <div class="login-box">
            <form action="{{route('authenticate')}}" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email">

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">

                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>
