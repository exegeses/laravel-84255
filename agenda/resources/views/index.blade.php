@include('layouts.header')

    <h1>Listado de personas</h1>

@include('layouts.notificaciones')

    <table>
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Nacimiento</th>
            <th colspan="2" id="add">
                <a href="/create">add</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($personas as $persona)
        <tr>
            <td>{{ $persona->nombre }} </td>
            <td>{{ $persona->apellido }}</td>
            <td>{{ $persona->dni }}</td>
            <td>{{ $persona->telefono }}</td>
            <td>{{ $persona->nacimiento }}</td>
            <td><a href="/edit/{{ $persona->id }}">edit</a></td>
            <td><a href="/confirm/{{ $persona->id }}">delete</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>

@include('layouts.footer')
