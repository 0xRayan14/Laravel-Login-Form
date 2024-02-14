@extends('layout')

@section('title', "TrekBlog - Edit")

@section('body')
    <div class="container">
        <h1 class="text-center">Edit the post</h1>

        <form class="w-75 mx-auto my-5" action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <x-input name="title" label="Title" value="{{$post->title}}"></x-input>
            <x-input name="content" label="Content" type="textarea" value="{{old('content')}}"></x-input>
            <x-input name="image" label="Image" type="file" value="{{$post->content}}"></x-input>
            <button class="btn btn-primary">Modify</button>
        </form>
    </div>

@endsection
