@extends('layout')

@section('title', "TrekBlog - Create")

@section('body')
<div class="container">
    <h1 class="text-center">Add a post</h1>

    <form class="w-75 mx-auto my-5" action="" method="post" enctype="multipart/form-data">
        @csrf
        <x-input name="title" label="Title" value="{{old('title')}}"></x-input>
        <x-input name="content" label="Content" type="textarea" value="{{old('content')}}"></x-input>
        <x-input name="image" label="Image" type="file" value="{{old('title')}}"></x-input>
        <button class="btn btn-primary">Add</button>
    </form>
</div>

@endsection
