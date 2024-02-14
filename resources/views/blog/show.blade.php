@extends('layout')

@section('title', "TrekBlog")

@section('body')
    <div class="container">
        <h1 class="text-center">Details of the article</h1>
                <div class="flex justify-center card">
                    <div class="card-header">
                        Autor : {{$post->user->firstname}}  {{$post->user->lastname}}
                    </div>
                    <div class="card-body">
                        <h4>{{$post->title}}</h4>                           <p>Posted the {{$post->created_at}}</p>
                        <p>{{$post->content}}</p>
                        <img class="img-thumbnail" src="/storage/{{$post->image}}" alt="{{$post->title}}">
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-outline-light" href="{{route('post.show', $post)}}">Modify</a>
                        <form action="" method="post">
                            @csrf
                            <button class="btn btn-outline-danger" >Delete</button>
                        </form>
                    </div>
                </div>
    </div>
@endsection
