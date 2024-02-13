<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>@yield('title')</title>
    </head>
    <body data-bs-theme="dark">


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TrekBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    @guest()
                        <a class="nav-link" href="{{route('auth.register')}}">S'enregistrer</a>
                        <a class="nav-link" href="{{route('auth.login')}}">Connexion</a>
                    @endguest

                    @auth()
                        <form action="{{route('auth.logout')}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary">Se déconnecter</button>
                        </form>
                    @endauth
                </div>
            </div>

        </div>
    </nav>

    @if(session('ok'))
        <x-flash>{{session('ok')}}</x-flash>
    @endif

    @if(session('ko'))
    <x-flash>{{session('ko')}}</x-flash>
    @endif

    @yield('body')

    </body>
</html>
