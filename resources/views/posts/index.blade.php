@extends('layouts/app')

@section('content')
    <h1>POSTS</h1>

    {{--the $posts is the json array containing the posts that we obtained when the PostsController@index is called--}}
    @if(count($posts)>0)
    @foreach($posts as $post)
        {{--**** the following line interacts with the PostsController@show, but never calls it!!!  ****--}}
        <h3><a href="http://localhost/lsapp2/public/posts/{{$post->id}}" >{{$post->title}}</a></h3>
        <small>Written on {{$post->created_at}}</small>
    @endforeach
        {{--for the pagination--}}
        {{$posts->links()}}

        @else
        <p>no posts</p>
    @endif
    @endsection
