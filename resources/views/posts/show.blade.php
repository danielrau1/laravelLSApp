@extends('layouts/app')

@section('content')
    <a href="http://localhost/lsapp2/public/posts" >Go Back</a>
    <h1>{{$post->title}}</h1>
<small>Written on {{$post->created_at}}</small>
   <div>
       {{--use following notation like this parse the html tags due to the ck-editor for the posts/create--}}
       {!!$post->body!!}
   </div>
    <a href="http://localhost/lsapp2/public/posts/{{$post->id}}/edit" >Edit</a>

    {{--To delete a post need to make a form:--}}

    {{ Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'post'])}}

    {{--the real method here is delete--}}
    {{Form::hidden('_method','DELETE')}}

    {{Form::submit('Delete')}}
    {{ Form::close()}}

@endsection
