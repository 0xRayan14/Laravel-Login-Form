@extends('layout')
@section('title', 'Inscription')

@section('body')
    <div class="container">
        <h1 class="text-center">Inscription</h1>

        <form class="w-75 mx-auto my-5 " action="" method="post">
            @csrf
            <x-input name="firstname" label="Prénom" value="{{old('firstname')}}"></x-input>
            <x-input name="lastname" label="Nom" value="{{old('lastname')}}"></x-input>
            <x-input name="email" label="Email" type="email" value="{{old('email')}}"></x-input>
            <x-input name="password" label="Mot de passe" type="password" value="{{old('password')}}"></x-input>
            <button class="btn btn-info">S'inscrire</button>
        </form>
    </div>
@endsection
