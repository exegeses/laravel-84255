@include('layouts.header')

    <h2>Agregar nueva persona</h2>

    <form action="/store" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido">

        <label for="dni">DNI</label>
        <input type="number" name="dni" id="dni">

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono">

        <label for="nacimiento">Nacimiento</label>
        <input type="date" name="nacimiento" id="nacimiento"
               max="{{ date('Y-m-d') }}">

        <div class="acciones">
            <button type="submit">Agregar</button>
            <a href="/">Cancelar</a>
        </div>

    </form>

@include('layouts.footer')
