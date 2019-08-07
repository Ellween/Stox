<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" /> 
        <title>Stoxtrades</title>
        <link rel="stylesheet" href="/css/loading-bar.css">
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="/js/loading-bar.js"></script>

        
    </head>
    <body>
        <header>
            @include('include._header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('include._footer')
        </footer>
    </body>
</html>
