<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css')}}"> --}}
    <style>
        a{
            text-decoration: none;
        }
        .img-size{
            display: flex;
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div id="app">

        @include('includes.menu')
        <main class="py-4">
            <div class="container">
                @include('includes.message')
                @yield('content')
            </div>
        </main>
    </div>
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error(error);
        } );
    </script>
</body>
</html>
