{{--(1)make this specific part go inside layouts/app--}}
@extends('layouts/app')

@section('content')
    <h1>{{$title}}</h1>

    {{--loop through and output the services that were passed in the $data array--}}
    <p>the list of services was obtained by passing the services inside the $data array:</p>
    @if(count($services)>0)
        <ul>
        @foreach($services as $service)
            <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
