@extends('layouts.app')

@section('contenido')

    <div class="py-8">

        <div class="flex items-center gap-3">
            <div class="w-1 h-8 bg-violeta rounded-full"></div>
            <h1 class="text-2xl text-white font-normal">Agregar nueva marca</h1>
        </div>
        <p class="text-gris-light text-sm mt-1 pl-4">Ingresa el nombre de la nueva marca.</p>

        <form action="" method="" class="max-w-lg mx-auto mt-6 p-6 rounded-xl shadow-lg shadow-black/40 bg-white/[0.02]">


            <label for="marca" class="text-gris-light text-sm">Marca</label>
            <input type="text" name="marca" id="marca"
                   class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-white outline-none
                       {{ $errors->has('marca') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">

            @error('marca')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-gradient-to-br from-violeta to-violeta-dark hover:from-violeta-light hover:to-violeta text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-lg shadow-violeta/30 duration-300 transition-all">
                    Agregar
                </button>
                <a href="!#" class="flex items-center gap-1.5 border border-violeta hover:bg-violeta/10 text-violeta-light text-sm font-semibold px-5 py-2.5 rounded-lg duration-300 transition-colors">
                    <x-icon-x /> Cancelar
                </a>
            </div>
        </form>

    </div>

@endsection
