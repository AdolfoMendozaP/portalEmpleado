<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Consultancy</title>
    </head>
    <body>
        @include('partials.nav')
        <h1>Hola mundo, {{ $user->name }}!</h1>
    </body>
</html>
