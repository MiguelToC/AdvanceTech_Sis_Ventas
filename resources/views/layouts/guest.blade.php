<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Html::style('Melody/vendors/iconfonts/font-awesome/css/all.min.css') !!}
    <title>{{ config('app.name', 'Bienvenido') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="hola" style="background-color: rgb(87, 87, 255); padding-bottom: 15px  ">
        
        
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <a href="http://127.0.0.1:8000" style="font-size: 20px; color:white"><i class="fa fa-caret-left fa-6">Regresar</i></a>
        </div>
    </div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900"
        style="background-color: rgb(214, 220, 252)">
        <div>
            <a href="/">
                <x-application-logo class=" h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
            style="background-color: rgb(46, 145, 244)">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
