@extends('layouts.app')

@section('contenido')

    <div class="py-8">

        <div class="flex items-center gap-3">
            <div class="w-1 h-8 bg-violeta rounded-full"></div>
            <h1 class="text-2xl text-white font-normal">Agregar nuevo producto</h1>
        </div>
        <p class="text-gris-light text-sm mt-1 pl-4">Completa los datos del nuevo producto.</p>

        <form action="/productos/store" method="post" enctype="multipart/form-data"
              class="max-w-lg mx-auto mt-6 p-6 rounded-xl shadow-lg shadow-black/40 bg-white/[0.02]">
            @csrf

            {{-- Producto --}}
            <label for="producto" class="text-gris-light text-sm">Producto</label>
            <input type="text" name="producto" id="producto" maxlength="50"
                   value="{{ old('producto') }}"
                   class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-white outline-none
                   {{ $errors->has('producto') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">
            @error('producto')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Precio --}}
            <label for="precio" class="block mt-4 text-gris-light text-sm">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" min="0"
                   value="{{ old('precio') }}"
                   class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-white outline-none
                   {{ $errors->has('precio') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">
            @error('precio')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Marca --}}
            <label for="id_marca" class="block mt-4 text-gris-light text-sm">Marca</label>
            <select name="id_marca" id="id_marca"
                    class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-white outline-none
                    {{ $errors->has('id_marca') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">
                <option value="" class="bg-gray-900">Selecciona una marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id_marca }}" class="bg-gray-900"
                        @selected(old('id_marca') == $marca->id_marca)>
                        {{ $marca->marca }}
                    </option>
                @endforeach
            </select>
            @error('id_marca')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Categoría --}}
            <label for="id_categoria" class="block mt-4 text-gris-light text-sm">Categoría</label>
            <select name="id_categoria" id="id_categoria"
                    class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-white outline-none
                    {{ $errors->has('id_categoria') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">
                <option value="" class="bg-gray-900">Selecciona una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" class="bg-gray-900"
                        @selected(old('id_categoria') == $categoria->id_categoria)>
                        {{ $categoria->categoria }}
                    </option>
                @endforeach
            </select>
            @error('id_categoria')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Descripción --}}
            <label for="descripcion" class="block mt-4 text-gris-light text-sm">Descripción <span class="text-gris-light/60">(opcional)</span></label>
            <textarea name="descripcion" id="descripcion" rows="4" maxlength="1000"
                      class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-white outline-none resize-none
                      {{ $errors->has('descripcion') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">{{ old('descripcion') }}</textarea>
            @error('descripcion')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Imagen --}}
            <label for="imagen" class="block mt-4 text-gris-light text-sm">Imagen <span class="text-gris-light/60">(opcional)</span></label>
            <input type="file" name="imagen" id="imagen" accept="image/*"
                   class="w-full mt-2 bg-black/20 border rounded-lg px-4 py-3 text-gris-light text-sm outline-none
                   file:mr-4 file:rounded-lg file:border-0 file:bg-violeta file:px-4 file:py-1.5 file:text-sm file:font-semibold file:text-white
                   {{ $errors->has('imagen') ? 'border-red-400' : 'border-violeta/40 focus:border-violeta' }}">
            @error('imagen')
            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror

            {{-- Destacado / Activo --}}
            <div class="flex flex-col gap-3 mt-6">
                <label class="flex items-center gap-3 text-gris-light text-sm cursor-pointer">
                    <input type="hidden" name="destacado" value="0">
                    <input type="checkbox" name="destacado" value="1"
                           class="size-4 accent-violeta"
                        @checked(old('destacado', 0) == 1)>
                    Producto destacado
                </label>

                <label class="flex items-center gap-3 text-gris-light text-sm cursor-pointer">
                    <input type="hidden" name="activo" value="0">
                    <input type="checkbox" name="activo" value="1"
                           class="size-4 accent-violeta"
                        @checked(old('activo', 1) == 1)>
                    Producto activo
                </label>
            </div>

            {{-- Botones --}}
            <div class="flex gap-3 mt-6">
                <button type="submit" class="bg-gradient-to-br from-violeta to-violeta-dark hover:from-violeta-light hover:to-violeta text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow-lg shadow-violeta/30 duration-300 transition-all">
                    Agregar
                </button>
                <a href="/productos" class="flex items-center gap-1.5 border border-violeta hover:bg-violeta/10 text-violeta-light text-sm font-semibold px-5 py-2.5 rounded-lg duration-300 transition-colors">
                    <x-icon-x /> Cancelar
                </a>
            </div>
        </form>

    </div>

@endsection
