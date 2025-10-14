<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
@extends('layouts.nav')
@section('content')
    @auth
        <p>Logged In Users See This.</p>
        @for($i = 0; $i < 5; $i++)
            <p>Iteration {{$i}}</p>
        @endfor
    @endauth
    @guest
        <p>Guest Users See This.</p>
    @endguest
@endsection
</body>
</html>
