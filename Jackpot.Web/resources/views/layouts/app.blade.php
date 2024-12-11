<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Jackpot - Admin Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css','resources/js/app.js'])

        @yield('css_content')
    </head>
    <body>
        <div id="app" class="h-[100vh] w-[100vw] bg-jcolor8">
            @include('layouts.header.header')
            
            @include('layouts.side_menu.index')
            
            @yield('content')
            
        </div>
        @yield('js_content')
    </body> 
</html>