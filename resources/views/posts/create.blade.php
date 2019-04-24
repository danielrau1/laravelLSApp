@extends('layouts/app')

@section('content')
    <h1>CREATE POST</h1>
{{ Form::open(['action'=>'PostsController@store','method'=>'post'])}}
    {{Form::label('title','Title')}}
    {{Form::text('title')}}
<br>
    {{Form::label('body','Body')}}
    {{Form::textarea('body','',['id'=>'summary-ckeditor'])}}

{{Form::submit('Submit')}}
{{ Form::close()}}
@endsection
