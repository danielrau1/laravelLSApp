<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--just make sure to modify the title if not given, just like before--}}
    <title>{{ config('app.name', 'LSAPP2') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        {{--(2)including the "combined" navbar: the old navbar and the elements of the new that obtained when did php auth in the terminal--}}
        @include('inc/navbar');


        <main class="py-4">
            {{--(1)that's where all the other pages go to, just like previously--}}
            @yield('content')
        </main>
    </div>


    {{--https://artisansweb.net/install-use-ckeditor-laravel/--}}
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
</body>
</html>
