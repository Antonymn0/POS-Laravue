<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="url" content="{{ url('') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"> {{--  path to main css file --}}
        <link rel="stylesheet" href="{{ URL::asset('css/hover.css') }}"> {{--  path to hover css file --}}
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}"> {{--  path to font awesome css file --}}
       
        
    </head>
    <body class="">
        <div class="relative flex items-top ">           
            <div class="page-container sidebar-collpased">
                    <div id="app">
                     @yield('content')
                    </div>
                </div>
            </div>
        </div>

<script src= "{{ asset('js/app.js') }}" defer> </script>
<script src= "{{ URL::asset('js/scripts.js') }}" defer> </script>
<script src= "{{ URL::asset('js/bars.js') }}" defer> </script>
<script src= "{{ URL::asset('js/skycons.js') }}" defer> </script>
 
</body>       
</html>
