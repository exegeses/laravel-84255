@extends('layouts.app')

@section('contenido')

    <div class="flex items-start justify-between py-8">
        <div>
            <h1 class="border-l-4 border-violeta pl-3 text-2xl text-white font-normal">Categorías</h1>
            <p class="text-gris-light text-sm mt-1 pl-4">Administración de categorías.</p>
        </div>

        <a href="!#" class="bg-gradient-to-br from-violeta to-violeta-dark hover:from-violeta-light hover:to-violeta text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-lg shadow-violeta/30 duration-300 transition-all whitespace-nowrap">
            Agregar categoría
        </a>
    </div>

    {{-- Notificación --}}
    <x-toast />

    <section class="flex flex-col gap-2.5 pl-4 pb-8">


            <article class="flex items-center justify-between bg-white/[0.03] hover:bg-white/[0.08] hover:translate-x-1.5 rounded-xl px-4.5 py-3.5 transition-all">

                <div class="flex items-center gap-2.5">
                    <span class="text-violeta text-sm">&rsaquo;</span>
                    <span class="text-gris-light text-sm">Nombre Categoría</span>
                </div>

                <div class="flex gap-3.5">
                    <a href="!#" class="text-gris-light hover:text-violeta-light">
                        <x-icon-edit />
                    </a>
                    <a href="!#" class="text-gris-light hover:text-violeta-light">
                        <x-icon-delete />
                    </a>
                </div>

            </article>



    </section>

@endsection
