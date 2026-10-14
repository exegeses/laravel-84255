# Enrutador/es

## 1. ¿Qué es el enrutador (*router*)?

Imagina que el enrutador es como el **operador de una central telefónica** o un **policía de tránsito o un mecanismo de cambio de vía (de tren o subte)**. Su único trabajo es mirar la petición que llega (la URI que escribió el usuario y el método HTTP) y decir: *"Muy bien, esta dirección corresponde a esta acción exacta"*.

Es el puente entre el mundo exterior (el navegador) y tu código interno.

## 2. ¿Redirige a los diferentes controladores?

Técnicamente no hace una "redirección" HTTP (como mandar al usuario a otra página web con un código 302), sino que **conecta y despacha** la petición hacia el controlador correspondiente (o hacia una función anónima).

En lugar de poner todo el código de la lógica dentro de la ruta, lo normal es mandar al usuario a un **Controlador** (el archivo que maneja la lógica pesada). Por ejemplo:

PHP
```php
// El enrutador conecta la URI '/usuarios' con el método 'index' del controlador UserController
Route::get('/usuarios', [UserController::class, 'index']);
```

## 3. ¿Qué pasa si una URI no está en el enrutador?

Si un usuario escribe una dirección que no existe en ninguno de tus archivos de rutas, Laravel no encuentra coincidencia y **retorna automáticamente un error 404 (Página no encontrada)**.

## Los archivos de rutas en Laravel (¿Hay más?)

Sí, Laravel organiza sus rutas en diferentes archivos dentro de la carpeta **`routes/`** dependiendo de para qué sirven. Los principales son:

- **`routes/web.php`**: Es el que más vas a usar. Es para las rutas de tu sitio web normal (las que cargan vistas HTML, manejan sesiones, formularios, etc.).
- **`routes/api.php`**: Es exclusivo para crear una **API** (por ejemplo, si estás haciendo una app móvil o un backend para Vue/React). Las rutas aquí tienen un comportamiento diferente (no manejan sesiones de navegador) y por defecto se les agrega el prefijo `/api`.
- **`routes/console.php`**: Como mencionaste, este no es para peticiones web de navegadores, sino para **crear comandos personalizados de la consola de comandos (Artisan)** usando código rápido.
- **`routes/channels.php`**: (El que faltaba) Se usa para la **difusión de eventos en tiempo real** (WebSockets), definiendo qué usuarios tienen permiso de escuchar canales privados (por ejemplo, en un chat en vivo).

> En resumen, el enrutador es el mapa general de tu aplicación y se divide en estos archivos para mantener todo ordenado según el tipo de tráfico que reciba.