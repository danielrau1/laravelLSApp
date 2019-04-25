@extends('layouts/app')

@section('content')
    <h1>EDIT POST</h1>
    {{ Form::open(['action'=>['PostsController@update',$post->id],'method'=>'post'])}}
    {{Form::label('title','Title')}}
    {{Form::text('title',$post->title)}}
    <br>
    {{Form::label('body','Body')}}
    {{Form::textarea('body',$post->body,['id'=>'summary-ckeditor'])}}

    {{--in order to be able to de the post since update should be either put or patch--}}
    {{Form::hidden('_method','PUT')}}

    {{Form::submit('Submit')}}
    {{ Form::close()}}
@endsection

