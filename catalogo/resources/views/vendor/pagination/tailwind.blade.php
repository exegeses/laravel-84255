@if ($paginator->hasPages())
    <nav class="flex items-center justify-between mx-4 mt-6 rounded-xl px-4 py-2.5 transition-colors" aria-label="Paginación">

        @if ($paginator->onFirstPage())
            <span class="text-gris-light/30 text-xs px-3 py-1.5">Anterior</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="text-gris-light/70 hover:text-violeta-light text-xs px-3 py-1.5 transition-colors">Anterior</a>
        @endif

        <div class="flex gap-1">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="text-gris-light/30 text-xs px-2 py-1">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="bg-violeta/20 text-violeta-light text-xs px-2.5 py-1 rounded-md">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="text-gris-light/70 hover:text-violeta-light border border-violeta/20 text-xs px-2.5 py-1 rounded-md transition-colors">{{ $page }}</a>
                            @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="text-gris-light/70 hover:text-violeta-light text-xs px-3 py-1.5 transition-colors">Siguiente</a>
        @else
            <span class="text-gris-light/30 text-xs px-3 py-1.5">Siguiente</span>
        @endif

    </nav>
@endif
