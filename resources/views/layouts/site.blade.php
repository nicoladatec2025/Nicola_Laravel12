<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NicolaDaTec</title>
</head>

<body>

    <a href="{{ route('login') }}">Login</a><br>

    @yield('content')

</body>

</html>
