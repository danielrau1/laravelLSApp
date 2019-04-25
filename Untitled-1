<!doctype html>
<html>
<head>
    {{--For the title use the APP_NAME in the .env, if nothing there then make it LSAPP2 --}}
    <title>{{config('app.name','LSAPP2')}}</title>
</head>


<body>
{{--(2) to include the navbar - so it is always here--}}
@include('inc/navbar')

{{--(1)now all the other pages go inside here when they are called through the url--}}
@yield('content')


{{--https://artisansweb.net/install-use-ckeditor-laravel/--}}
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
</body>
</html>
