<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/css/assets/RemixIcon/fonts/remixicon.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    @include('components.navbar')

    @yield('content')

    @if (session('success'))
        <div class="success-message" id="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="error-message" id="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="warning-message" id="alert">
            {{ session('warning') }}
        </div>
    @endif
</body>

</html>
