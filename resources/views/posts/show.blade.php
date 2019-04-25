@extends('layouts/app')

@section('content')
    <a href="http://localhost/lsapp2/public/posts" >Go Back</a>
    <h1>{{$post->title}}</h1>
                    {{--(11) can add the user name who created the post thanks to the user post relationshipd--}}
<small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
   <div>
       {{--use following notation like this parse the html tags due to the ck-editor for the posts/create--}}
       {!!$post->body!!}
   </div>

    {{--(13 see the edit and the delete only if logged in (by now they are useless if not logged in due to (12) )--}}
    {{--so if not a guest will be able to see the edit and delete--}}
    @if(!Auth::guest())

        {{--(14) a logged in user should edit and delete his own posts only !--}}
        @if(Auth::user()->id == $post->user_id)
    <a href="http://localhost/lsapp2/public/posts/{{$post->id}}/edit" >Edit</a>

    {{--To delete a post need to make a form:--}}

    {{ Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'post'])}}

    {{--the real method here is delete--}}
    {{Form::hidden('_method','DELETE')}}

    {{Form::submit('Delete')}}
    {{ Form::close()}}
            @endif
@endif
@endsection
