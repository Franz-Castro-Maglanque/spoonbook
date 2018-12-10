<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


   

    
    <style type="text/css">
    * {
    box-sizing: border-box;
    }
    

    .column {
    float: left;
    width: 25%;
    padding: 10px;
    }

    .img {

    width:  300px;
    height: 200px;
    position: relative;
    float: left;
    background-position: 50% 50%;
    background-repeat:   no-repeat;
    background-size:     cover;
    }
    </style>


</head>
<body>
    <div id="app">
     @include('inc/navbar')
        <main class="py-4">
            <div class="container">
                @include('inc/messeges')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
