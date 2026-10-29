@extends('layouts.app')

@section('contenido')

    <div class="py-8">

        <div class="flex items-center gap-3">
            <div class="w-1 h-8 bg-violeta rounded-full"></div>
            <h1 class="text-2xl text-white font-normal">Eliminar marca</h1>
        </div>
        <p class="text-gris-light text-sm mt-1 pl-4">Confirme la eliminación de la marca seleccionada.</p>

        <div class="max-w-lg mx-auto mt-8 p-6 rounded-xl shadow-lg shadow-black/40 bg-white/[0.02] text-center">

            <div class="w-24 h-24 mx-auto mb-8 rounded-full flex items-center justify-center text-warning-light bg-warning/[0.12] border border-warning/35 shadow-warning">
                <div class="w-11 h-11">
                    <x-icon-trash-filled />
                </div>
            </div>

            <p class="text-warning-light text-lg mt-6">¿Está seguro que desea eliminar esta marca?</p>

            <div class="bg-violeta/10 border border-violeta/30 rounded-lg py-3 mt-6">
                <span class="text-violeta-light text-xl font-semibold">
                    {{ $marca->marca }}
                </span>
            </div>

            <p class="text-gris-light text-sm mt-6">
                Esta acción eliminará definitivamente la marca y <span class="text-warning font-semibold">no podrá deshacerse.</span>
            </p>

            <div class="flex justify-center gap-3 mt-8">
                <a href="/marcas" class="flex items-center gap-1.5 border border-violeta hover:bg-violeta/10 text-violeta-light text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors">
                    <x-icon-x /> Cancelar
                </a>
                <form action="/marcas/{{ $marca->id_marca }}/delete" method="post">
                @csrf
                @method('delete')

                    <button type="submit" class="flex items-center gap-2 bg-warning hover:bg-warning-light text-white hover:text-[hsl(240,20%,8%)] text-sm font-semibold px-8 py-3.5 rounded-lg shadow-warning transition-all duration-300 ease-in-out">
                        <div class="w-4 h-4 shrink-0"><x-icon-trash-filled /></div> Eliminar marca
                    </button>
                </form>
            </div>

        </div>

    </div>

@endsection
