<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'College Safsaf' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/tw.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{ $css ?? '' }}

        @auth
            <style>
                .editable{
                    box-sizing: border-box;
                    position: relative;
                }
                .editable:hover{
                    border: orange 1px solid;
                }
                .editable:hover .editable-link{
                    display: block;
                }
                .editable .editable-link{
                    display: none;
                    position: absolute;
                    top: 0;
                    right:0;
                    transform: translateY(-50%);
                    z-index: 2000;
                    font-size: 11px;
                    background-color: orange;
                    border-radius: 100%;

                    height: 22px;
                    width: 22px;
                    padding: 5px;
                    color:white;

                    text-shadow: 0 0 2px #000, 0 0 6px rgba(0, 0, 0, .7), 0 0 10px rgba(0, 0, 0, .5);
                }
            </style>
        @endauth

    </head>
    <body class="font-lato antialiased text-lg">
        <x-base.header/>

        {{ $slot }}

        <x-base.footer/>

        {{ $js ?? '' }}
    </body>
</html>
