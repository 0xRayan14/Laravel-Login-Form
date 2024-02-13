@extends('layout')

@section('title', "Create a post")

@section('body')
    <h1 class="text-center">Add a post</h1>

    <form action="" method="post">
        <x-input name="title" label="Title" value="{{old('title')}}"></x-input>
        <x-input name="image" label="Image" type="file" value="{{old('title')}}"></x-input>
    </form>

@endsection
