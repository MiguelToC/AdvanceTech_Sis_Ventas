<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <title>AdvanceTech</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-white-900" >
            @include('layouts.navigation')

            <!-- Page Heading -->
            

            <!-- Page Content -->
            <main>
                
                <div class="container" style="text-align: center; margin:10px" >
                    <h1 class="slogan" style="font-size: 32px; color: #333">AdvanceTech</h1>
                </div>
                <div class="container" style="text-align: center; margin:10px" >
                    <h1 class="slogan" style="font-size: 52px; color: #333; padding:15px">TECNOLOGÍA DE VANGUARDIA PARA UN MUNDO EN CONSTANTE EVOLUCIÓN.</h1>
                </div>
                <div class="container" style="text-align: center; margin:10px" >
                    <img src="/Melody/images/bot2.png" alt="" style="text-align: center; margin-left:450px">
                </div>
            </main>
        </div>
    </body>
</html>
