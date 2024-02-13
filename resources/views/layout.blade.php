<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>@yield('title')</title>
    </head>
    <body data-bs-theme="dark">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Accueil</a>
            <div>
                <a href="{{route('auth.register')}}" class="btn btn-info">Inscription</a>
                <a href="{{route('auth.login')}}" class="btn btn-info">Connexion</a>
            </div>
        </div>
    </nav>
    @yield('body')

    </body>
</html>
