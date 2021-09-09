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

    </head>
    <body class="font-lato antialiased text-lg">
        <x-base.header/>

        {{ $slot }}

        {{-- footer --}}

        {{ $js ?? '' }}
    </body>
</html>