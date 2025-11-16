<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="@yield('body_class')">
    <div id="app">
        <!-- Mostrar navbar solo si NO estamos en login o registro -->
        @if (!Route::is('login') && !Route::is('register') && !Route::is('password.*') && !Route::is('verification.*'))
        @include('layouts.navbar')
        @endif

        <main class="@if (Route::is('login') || Route::is('register') || Route::is('password.*')) login-main @else py-4 @endif">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap Bundle JS (incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FIX TEMPORAL PARA DROPDOWN -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.getElementById('navbarDropdown');
            if (dropdownToggle) {
                // Forzar inicialización del dropdown
                const dropdown = new bootstrap.Dropdown(dropdownToggle);
                
                // Agregar listener manual
                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    dropdown.toggle();
                });
            }
        });
    </script>
</body>
</html>