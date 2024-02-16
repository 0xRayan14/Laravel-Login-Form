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
            <a class="navbar-brand" href="/#">TrekBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @auth()
                        <a href="{{ route('blog.profile') }}">
                            <img src="{{ asset('images/' . Auth::user()->image) }}" alt="Profile Picture" class="rounded-circle me-2" style="width: 40px; height: 40px;">
                        </a>
                    @endauth
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    @guest()
                        <a class="nav-link" href="{{route('auth.register')}}">Register</a>
                        <a class="nav-link" href="{{route('auth.login')}}">Login</a>
                    @endguest

                    @auth()
                        <div class="flex justify-between">
                            <a href="{{route('post.create')}}" class="nav-link active">New post</a>

                        </div>



                        <form action="{{ route('auth.logout') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="nav-link">Logout</button>
                        </form>
                    @endauth
                </div>

            </div>
            <a href="{{ route('blog.profile') }}" class="btn btn-outline-info me-2">Profile</a>

            <div class="flex justify-between">
                <form action="{{route('blog.search')}}" method="get" class="d-flex" role="search">
                    <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
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
