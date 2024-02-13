@extends('layout')
@section('title', 'Connexion')

@section('body')
    <div class="container">
        <h1 class="text-center">Connexion</h1>

        <form class="w-75 mx-auto my-5 " action="" method="post">
            @csrf
            <x-input name="email" label="Email" type="email"></x-input>
            <x-input name="password" label="Mot de passe" type="password"></x-input>
            <button class="btn btn-info">Se connecter</button>
        </form>
    </div>
@endsection
