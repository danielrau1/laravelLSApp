@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--(5) here will make such that only a logged-in user can create a post --}}
                        <li><a href="http://localhost/lsapp2/public/posts/create">Add Post</a></li>

                        <h3>Your blog posts</h3>
                        {{--(10) table with the posts of the logged in user--}}
                        @if(count($posts)>0)
                        <table>
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="http://localhost/lsapp2/public/posts/{{$post->id}}/edit" >Edit</a></td>
                                    <td>
                                        {{--To delete a post need to make a form:--}}

                                        {{ Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'post'])}}

                                        {{--the real method here is delete--}}
                                        {{Form::hidden('_method','DELETE')}}

                                        {{Form::submit('Delete')}}
                                        {{ Form::close()}}
                                    </td>
                                </tr>
                                @endforeach

                        </table>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
