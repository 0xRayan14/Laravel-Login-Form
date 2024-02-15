@extends('layout')

@section('title', "TrekBlog - Home")

@section('body')
    <div class="container">
        <h1 class="text-center"></h1>
        <ul>
            @foreach($posts as $post)
                   <div class="flex justify-center card">
                       <div class="card-header">
                           Autor : {{$post->user->firstname}}  {{$post->user->lastname}}
                       </div>
                       <div class="card-body">
                           <h1>{{$post->title}}</h1>                           <p>Posted the {{$post->created_at}}</p>
                           <h4>{{$post->content}}</h4>
                           <img class="img-thumbnail img-fluid" src="/storage/{{$post->image}}" alt="{{$post->title}}">
                       </div>

                       <div class="card-footer d-flex align-items-center justify-content-between">
                           <a class="btn btn-outline-light" href="{{route('post.show', $post)}}">See more</a>
                           @can('update', $post)

                           <form action="{{route('post.delete', $post)}}" method="post">
                               @csrf
                               @method('delete')
                               <button class="btn btn-outline-danger" >Delete</button>
                           </form>
                       </div>
                       @endcan
                   </div>
            @endforeach
        </ul>

        {{$posts->links()}}
    </div>
@endsection
