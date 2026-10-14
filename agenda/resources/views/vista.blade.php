@include('layouts.header')

    <h1>Soy una vista</h1>
    {{-- hablebars  (mustache) --}}
    {{ time() }}

    <h2>directiva condicional if()</h2>
    <p>Número enviado: {{ $numero }}</p>

    @if( $numero < 10)
        es menor que 10
    @else
        no es menor que 10
    @endif

    <h2>directiva de loop foreach()</h2>

    <ul>
    @foreach($personajes as $llave => $valor)
        <li>{{ $llave }}
            @switch($valor)
                @case('verif')
                    <x-verificado />
                    @break
                @case('no verif')
                    <x-noverificado />
                    @break
                @default
                    <x-desactivado />
                    @break
            @endswitch
        </li>
    @endforeach
    </ul>

@include('layouts.footer')
