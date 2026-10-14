@include('layouts.header')

<div class="confirm">
    <h1>Confirmación de baja de una persona</h1>

    <form action="/delete/{{ $persona->id }}" method="post">
        @method('delete')
        <p>¿Está seguro que quiere eliminar la persona
            <strong>
                {{ $persona->nombre }}
                {{ $persona->apellido }}
            </strong>
        </p>
        <div class="acciones">
            <button type="submit">Confirmar</button>
            <a href="/">Cancelar</a>
        </div>
    </form>

</div>

@include('layouts.footer')
