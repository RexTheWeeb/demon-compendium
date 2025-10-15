<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="bg-red-600">
    <a href="/">Home</a>
    <a href="{{ route('demons.index') }}">Demon List</a>
    <a href="/contact">Contact</a>
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
</nav>
@yield('content')
</body>
</html>
