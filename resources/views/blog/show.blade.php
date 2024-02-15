@extends('layout')

@section('title', "TrekBlog - Show")

@section('body')
    <div class="container">
        <h1 class="text-center">Details of the article</h1>
        <div class="flex justify-center card">
            <div class="card-header">
                Autor : {{$post->user->firstname}}  {{$post->user->lastname}}
            </div>
            <div class="card-body">
                <h1>{{$post->title}}</h1>                           <p>Posted the {{$post->created_at}}</p>
                <h4>{{$post->content}}</h4>
                <img class="img-thumbnail img-fluid" src="/storage/{{$post->image}}" alt="{{$post->title}}">
            </div>
            @can('update', $post)
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="btn btn-outline-light" href="{{route('post.edit', $post)}}">Modify</a>
                    <form action="{{route('post.delete', $post)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" >Delete</button>
                    </form>
                </div>
            @endcan
        </div>
    </div>
@endsection
