@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('contenido')
    <section class="py-12">
        <h1 class="text-4xl border-l-4 border-violeta pl-4">Dashboard</h1>
        <p class="mt-2 mb-10 text-gris-light text-base">Hola, {{-- auth()->user()->name --}}. ¿Qué querés hacer hoy?</p>

        {{-- opciones de la cuenta --}}
        <h2 class="text-2xl mb-4">Mi cuenta</h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 mb-12">
            <a href="#" class="block bg-white/[0.03] hover:bg-white/[0.08] border border-white/10 hover:border-violeta/40 rounded-xl p-6 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-medium">Notificaciones</h3>
                <p class="mt-1 text-sm text-gris-light">Revisá tus avisos.</p>
            </a>
            <a href="#" class="block bg-white/[0.03] hover:bg-white/[0.08] border border-white/10 hover:border-violeta/40 rounded-xl p-6 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-medium">Modificar email</h3>
                <p class="mt-1 text-sm text-gris-light">Cambiá el correo de tu cuenta.</p>
            </a>
            <a href="#" class="block bg-white/[0.03] hover:bg-white/[0.08] border border-white/10 hover:border-violeta/40 rounded-xl p-6 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-medium">Modificar contraseña</h3>
                <p class="mt-1 text-sm text-gris-light">Actualizá tu contraseña.</p>
            </a>
        </div>

        {{-- paneles de administración --}}
        <h2 class="text-2xl mb-4">Administración</h2>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <a href="/productos" class="block bg-white/[0.03] hover:bg-white/[0.08] border border-white/10 hover:border-violeta/40 rounded-xl p-6 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-medium">Productos</h3>
                <p class="mt-1 text-sm text-gris-light">Administración de productos.</p>
            </a>
            <a href="/marcas" class="block bg-white/[0.03] hover:bg-white/[0.08] border border-white/10 hover:border-violeta/40 rounded-xl p-6 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-medium">Marcas</h3>
                <p class="mt-1 text-sm text-gris-light">Administración de marcas.</p>
            </a>
            <a href="/categorias" class="block bg-white/[0.03] hover:bg-white/[0.08] border border-white/10 hover:border-violeta/40 rounded-xl p-6 transition-all duration-300 hover:-translate-y-1">
                <h3 class="text-lg font-medium">Categorías</h3>
                <p class="mt-1 text-sm text-gris-light">Administración de categorías.</p>
            </a>
        </div>
    </section>
@endsection
