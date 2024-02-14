@extends('layout')

@section('title', "TrekBlog")

@section('body')
    <div class="container">
        <h1>My Blog</h1>
        <ul>
            @foreach($posts as $post)
                   <div class="card">
                       <div class="card-header">
                           Autor : {{$post->user->firstname}}  {{$post->user->lastname}}
                       </div>
                       <div class="card-body">
                           <h4>{{$post->title}}</h4>
                           <p>{{$post->content}}</p>
                       </div>
                       <div class="card-footer">
                           <a class="btn btn-primary" href="">See more</a>
                       </div>
                   </div>
            @endforeach
        </ul>
    </div>
@endsection
