<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
    </head>
    <body>
        <h1>Bienvenido</h1>
        @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
           <li>{{ $error }} </li>
           @endforeach
        </ul>
        @endif
        <form method="POST">
            @csrf
            <label for="">
            <input type="text" name="email" required autofocus value="{{old('email')}}" id="" placeholder="Introduce tu Email">
            </label>
            @error('email') {{ $message }} @enderror
            <br>
            <label for="">
            <input type="password" name="password" required autofocus id="" placeholder="Introduce tu Contraseña">
            </label>
            @error('password') {{ $message }} @enderror<br>
            <label for="">
            <input type="checkbox" name="remember" id="">
            Recuerda mi sesion
            </label><br>
            <button type="submit">Ingresar</button>
        </form>
    </body>
</html>
