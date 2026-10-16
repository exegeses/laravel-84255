<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Catálogo')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    @vite('resources/css/app.css')
</head>
<body>
    <x-header />

    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-6">
            @yield('contenido')
        </div>
    </main>

    <x-footer />
    {{-- toggler del menú hamburger --}}
    <script>
        document.getElementById('nav-toggle').addEventListener('click', function () {
            const menu = document.getElementById('nav-menu');
            const expanded = this.getAttribute('aria-expanded') === 'true';

            menu.classList.toggle('hidden');
            this.setAttribute('aria-expanded', !expanded);
        });
    </script>
</body>
</html>
