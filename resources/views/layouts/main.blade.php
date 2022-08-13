<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Ping Eats</title>

    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css"/>

    @yield('midtrans')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/27ce9fb29a.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
<x-main-navbar/>

<div class="container mx-auto mt-6 pb-20">
    <x-session-alert/>

    @yield('content')
</div>

<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

@stack('script')
</body>

</html>
