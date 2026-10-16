<header class="border-b border-white/10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center md:justify-between px-6 py-4">

        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="!#" class="flex items-center gap-2">
                <x-logo />
                <span class="text-white text-base font-medium">Catálogo</span>
            </a>

            {{-- menú hamburger (solo visible en mobile) --}}
            <button id="nav-toggle" class="md:hidden text-gris-light" aria-label="Abrir menú" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <x-nav />

    </div>
</header>
