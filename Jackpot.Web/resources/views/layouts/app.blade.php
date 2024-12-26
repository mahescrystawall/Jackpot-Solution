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
    <body class="bg-jcolor8">
        <div id="app" class="h-full w-[100vw] bg-jcolor8">
            @include('layouts.header.header')
            
            @include('layouts.side_menu.index')
            
            <div class="pr-4">
                @yield('content')
            </div>
            
        </div>
        @yield('js_content')
        <script src="{{ asset('js/modal.js') }}"></script>
    </body> 
</html>