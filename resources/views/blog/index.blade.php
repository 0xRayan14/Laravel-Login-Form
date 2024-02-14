@extends('layout')

@section('title', "TrekBlog")

@section('body')
    <div class="container">
        <h1>My Blog</h1>
        <ul>
            @foreach($posts as $post)
                   <div class="flex justify-center card">
                       <div class="card-header">
                           Autor : {{$post->user->firstname}}  {{$post->user->lastname}}
                       </div>
                       <div class="card-body">
                           <h4>{{$post->title}}</h4>                           <p>Posted the {{$post->created_at}}</p>
                           <p>{{$post->content}}</p>
                           <img class="img-thumbnail img-fluid" src="/storage/{{$post->image}}" alt="{{$post->title}}">
                       </div>
                       <div class="card-footer">
                           <a class="btn btn-outline-light" href="{{route('post.show', $post)}}">See more</a>
                           <button class="btn btn-outline-danger" >Delete</button>
                       </div>
                   </div>
            @endforeach
        </ul>

        {{$posts->links()}}
    </div>
@endsection
