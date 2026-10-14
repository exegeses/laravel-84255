@include('layouts.header')

    <h2>Modificar persona</h2>

    <form action="/update/{{ $persona->id }}" method="post">
        @method('put')

        <label for="nombre">Nombre</label>
        <input type="text"
               value="{{ $persona->nombre }}"
               name="nombre" id="nombre">

        <label for="apellido">Apellido</label>
        <input type="text"
               value="{{ $persona->apellido }}"
               name="apellido" id="apellido">

        <label for="dni">DNI</label>
        <input type="number"
               value="{{ $persona->dni }}"
               name="dni" id="dni">

        <label for="telefono">Teléfono</label>
        <input type="text"
               value="{{ $persona->telefono }}"
               name="telefono" id="telefono">

        <label for="nacimiento">Nacimiento</label>
        <input type="date"
               value="{{ $persona->nacimiento }}"
               name="nacimiento" id="nacimiento"
               max="{{ date('Y-m-d') }}">

        <div class="acciones">
            <button type="submit">Modificar</button>
            <a href="/">Cancelar</a>
        </div>

    </form>

@include('layouts.footer')
