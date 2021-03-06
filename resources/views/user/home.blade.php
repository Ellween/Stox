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

        <style>
            .main-footer {
                margin-top: 0px !important;
            }
            
            .main-footer::after{
                content: "";
                background-image: none !important;
            }

            .personal_footer_header {
                font-style: "Inter";
                font-size: 16px;
                line-height: 32px;
                color: #ffffff;
            }

            .personal_support {
                display: flex;
            }

            .personal_support p {
                font-size: 18px;
                line-height: 22px;
                letter-spacing: 0.5px;
                opacity: .75;
                color: #FFFFFF;
                margin: 30px 40px 0px 40px;
            }

            .personal_bg {
                background-image: url("/images/peronal_bg.png");
                height: auto;
                background-size: cover;
                padding: 0px 0px 120px 0px;
            }

           
            
        </style>
        
    </head>
    <body>
        <header>
            @include('user.include.user_header')
        </header>
        <main>
            @yield('personal')
        </main>
        <footer>
            @include('user.include.user_footer')
        </footer>
    </body>
</html>