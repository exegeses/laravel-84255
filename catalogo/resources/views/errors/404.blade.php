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

<main>

        <div class="flex flex-col items-center justify-center
                    min-h-screen
                    text-violeta-light text-center leading-[0.9]">
            <p>404 <span class="mx-4">|</span> No Encontrado</p>
        {{--
            <p class="text-[128px] font-light">
                404
            </p>
            <p class="text-3xl">No Encontrado</p>
        --}}
        </div>

</main>


</body>
</html>
