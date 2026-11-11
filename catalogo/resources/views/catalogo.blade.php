@extends('layouts.app')

@section('contenido')
    <section class="grid grid-cols-2 md:grid-cols-4 gap-4 py-8">
        @foreach ($productos as $producto)

            <article class="bg-white/5 border border-white/10 rounded-xl overflow-hidden hover:bg-white/10 hover:border-violeta/40 hover:-translate-y-1 hover:shadow-violeta/20 transition-all">

                <div class="h-32 bg-violeta/10 flex items-center justify-center relative">
                    @if($producto->destacado)
                        <span class="absolute top-2 left-2 bg-black/60 backdrop-blur-sm text-dorado p-1.5 rounded-full">
                            <x-icon-star />
                        </span>
                    @endif
                    <img src="{{ asset('img/productos/' . $producto->imagen) }}" alt="{{ $producto->producto }}" class="h-full w-full object-cover">
                </div>

                <div class="p-4">
                    <p class="text-white text-sm font-medium mb-1">{{ $producto->producto }}</p>
                    <p class="text-violeta-light text-xs mb-2">{{ $producto->marcas->marca }} · {{ $producto->categorias->categoria }}</p>
                    <p class="text-white text-base font-medium">${{ number_format($producto->precio, 2) }}</p>
                </div>

            </article>

        @endforeach
    </section>

    {{ $productos->links() }}

@endsection
