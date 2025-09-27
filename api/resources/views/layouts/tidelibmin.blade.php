<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tidelib - Tienda de Libros')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon50x50.png') }}" type="image/x-icon">
    @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('styles')
    <!-- Estilos para el loader -->
    <style>
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
        .loading-container img {
            width: 60px;
            height: 60px;
        }
    </style>
    </head>
<body>
    <!-- Loader Global -->
    <div id="loading-overlay" wire:loading wire:target="editar" style="display: none;">
        <div class="loading-container">
            <img src="{{ asset('images/loading.gif') }}" alt="Cargando...">
        </div>
    </div>
    <div class="fixed-top">
        @yield('header_content')
    </div>
    <div style="height:60px"></div>
    <main class="container-fliud mt-4">
        @yield('content')
        {{ $slot ?? '' }}
    </main>
    
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p>&copy; 2025 Tidelib - Todos los derechos reservados.</p>
    </footer>
    
    @livewireScripts
    @yield('scripts')
</body>
</html>
