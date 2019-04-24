@extends('layouts/app')

@section('content')
    <a href="http://localhost/lsapp2/public/posts" >Go Back</a>
    <h1>{{$post->title}}</h1>
<small>Written on {{$post->created_at}}</small>
   <div>
       {{--use following notation like this parse the html tags due to the ck-editor for the posts/create--}}
       {!!$post->body!!}
   </div>
@endsection
