<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('uicons-brands/css/uicons-brands.css') }}">
    <link rel="stylesheet" href="{{ asset('uicons-regular-rounded/css/uicons-regular-rounded.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>Barea de Madagascar - @yield('title')</title>
</head>
<body>

    @include('user/layouts/header')
    @yield('content')


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
