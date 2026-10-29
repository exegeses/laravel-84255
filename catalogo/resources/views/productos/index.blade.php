@extends('layouts.app')

@section('contenido')

    <div class="flex items-start justify-between py-8">
        <div>
            <h1 class="border-l-4 border-violeta pl-3 text-2xl text-white font-normal">Productos</h1>
            <p class="text-gris-light text-sm mt-1 pl-4">Administración de productos.</p>
        </div>

        <a href="#" class="bg-gradient-to-br from-violeta to-violeta-dark hover:from-violeta-light hover:to-violeta text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-lg shadow-violeta/30 duration-300 transition-all whitespace-nowrap">
            Agregar producto
        </a>
    </div>

    {{-- Notificación --}}
    <x-toast />


    <section class="flex flex-col gap-2.5 pl-4 pb-8">


            <article class="flex flex-col md:flex-row md:items-center gap-3 md:gap-4 bg-white/[0.03] hover:bg-white/[0.06] rounded-xl p-4 transition-colors">

                <img src="/img/productos/no-disponible.svg" alt="{{ 'producto' }}" class="w-full h-28 md:w-14 md:h-14 rounded-lg object-cover">

                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-1.5">

                            <span class="text-dorado">
                                <x-icon-star />
                            </span>

                        <span class="text-white text-sm font-medium">{{ 'producto' }}</span>
                    </div>
                    <p class="text-gris-light text-xs mt-0.5">
                        {{ 'marca' }}
                        ·
                        {{ 'categoria' }}
                    </p>
                </div>

                <div class="flex items-center justify-between md:justify-end gap-4">
                    <span class="text-violeta-light text-sm font-semibold whitespace-nowrap">
                        U$D {{ 'precio' }}
                    </span>


                        <span class="bg-green-500/15 text-green-400 text-xs px-3 py-1 rounded-full whitespace-nowrap">Activo</span>

                        <span class="bg-red-500/15 text-red-400 text-xs px-3 py-1 rounded-full whitespace-nowrap">Inactivo</span>

                </div>

                <div class="flex gap-3.5 justify-end md:justify-start pt-2 md:pt-0 border-t md:border-t-0 border-white/5">
                    <a href="#" class="text-gris-light hover:text-violeta-light">
                        <x-icon-edit />
                    </a>
                    <a href="#" class="text-gris-light hover:text-violeta-light">
                        <x-icon-delete />
                    </a>
                </div>

            </article>


    </section>

    {{ 'paginador' }}

@endsection
