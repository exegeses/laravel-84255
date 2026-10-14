@if( session('mensaje') )
    <div id="notificaciones" class="{{ session('status') }}">
        {{ session('mensaje') }}
    </div>
@endif
