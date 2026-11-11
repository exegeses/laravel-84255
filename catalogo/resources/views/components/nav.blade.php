<nav class="relative">


    {{-- Links: ocultos en mobile por defecto, visibles siempre en desktop --}}
    <nav id="nav-menu" class="hidden mt-4 md:mt-0 md:flex md:items-center md:gap-6">
@auth
    {{-- usuario logueado --}}
        <a href="/dashboard" class="block text-right md:inline md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors">
            Dashboard
        </a>
        <a href="/productos" class="block text-right md:inline md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors">
            Productos
        </a>
        <a href="/marcas" class="block text-right md:inline md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors">
            Marcas
        </a>
        <a href="/categorias" class="block text-right md:inline md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors">
            Categorías
        </a>

        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="block w-full text-right md:w-auto md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors cursor-pointer">
                Logout
            </button>
        </form>
@else

        <a href="/registro" class="block text-right md:inline md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors">
            Registro
        </a>
        <a href="/login" class="block text-right md:inline md:text-left text-sm text-gris-light hover:text-violeta-light transition-colors">
            Login
        </a>
@endauth

    </nav>

</nav>
{{-- script en layouts/app --}}
