<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'LUXE Colombia'))</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    @stack('styles')
</head>
<body>
    <div id="app">
        <!-- Navigation - Hidden on auth pages -->
        @if (!Route::is('login') && !Route::is('register') && !Route::is('password.*') && !Route::is('verification.*'))
            @include('layouts.navbar')
        @endif

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer - Hidden on auth pages -->
        @if (!Route::is('login') && !Route::is('register') && !Route::is('password.*') && !Route::is('verification.*'))
            @include('layouts.footer')
        @endif
    </div>

    <!-- Scripts -->
    @stack('scripts')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
