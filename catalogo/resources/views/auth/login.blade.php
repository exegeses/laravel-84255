@extends('layouts.app')

@section('titulo', 'Login')

@section('contenido')
    <section class="max-w-lg mx-auto py-12">
        <h1 class="text-4xl border-l-4 border-violeta pl-4">Iniciar sesión</h1>
        <p class="mt-2 mb-8 text-gris-light text-base">Ingresá con tu email y contraseña.</p>

        <form action="/login" method="POST" class="bg-white/[0.03] border border-white/10 rounded-2xl p-6 space-y-5">
            @csrf

            {{-- email --}}
            <div>
                <label for="email" class="block text-sm text-gris-light mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full rounded-lg bg-white/5 border border-white/10 px-4 py-3 text-base focus:outline-none focus:border-violeta focus:ring-2 focus:ring-violeta/40">
                @error('email')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- contraseña --}}
            <div>
                <label for="password" class="block text-sm text-gris-light mb-2">Contraseña</label>
                <input type="password" id="password" name="password"
                       class="w-full rounded-lg bg-white/5 border border-white/10 px-4 py-3 text-base focus:outline-none focus:border-violeta focus:ring-2 focus:ring-violeta/40">
                @error('password')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- botones --}}
            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="bg-gradient-to-br from-violeta to-violeta-dark text-white text-sm font-semibold px-8 py-3.5 rounded-lg transition-all duration-300 ease-in-out hover:brightness-110">
                    Ingresar
                </button>
                <a href="/" class="text-sm text-gris-light border border-violeta/60 px-8 py-3.5 rounded-lg hover:text-violeta-light hover:border-violeta transition-colors">
                    Cancelar
                </a>
            </div>
        </form>
    </section>
@endsection
