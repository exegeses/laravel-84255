# Paginado de Registros en Laravel

El paginado es una herramienta fundamental en el desarrollo web para dividir conjuntos de datos grandes en fragmentos más pequeños y manejables (páginas). Laravel ofrece un sistema de paginado integrado, elegante y sumamente potente que funciona tanto con el **Query Builder** como con **Eloquent**.

## 1. Tipos de Paginación en Laravel

Laravel provee tres métodos principales según las necesidades de rendimiento y experiencia de usuario:

1. **`paginate()` (Paginación Basada en Offset):** La más común. Muestra números de páginas exactos (Ej. `1 2 3 ... 10`) y calcula el total de registros de la base de datos.

2. **`simplePaginate()` (Paginación Simple):** Muestra únicamente los botones de "Anterior" y "Siguiente". Es más eficiente para tablas gigantes porque no ejecuta la consulta para contar el total de registros.

3. **`cursorPaginate()` (Paginación por Cursores):** Altamente eficiente para millones de registros. Utiliza cursores basados en claves únicas (como el ID), evitando el uso de `OFFSET` para prevenir caídas de rendimiento en páginas profundas.

## 2. Paso a Paso: Implementación Básica con Eloquent

### Paso 1: Configurar el método

En tu controlador, define un endpoint que devuelva los registros paginados:

```php
public function index() : View
{
    $productos = Producto::orderByDesc('id_producto')->paginate(12);
    return view('productos.index', ['productos' => $productos]);
}
```

### Paso 2: Mostrar los Registros en la Vista Blade

En tu plantilla Blade (`resources/views/productos/index.blade.php`), recorre los datos normalmente y utiliza el método `links()` para renderizar la barra de navegación:

```html
@foreach ($productos as $producto)
    <p>{{ $producto->nombre }}</p>
@endforeach

<!-- Renderizar los enlaces de paginación -->
<div class="mt-4">
    {{ $productos->links() }}
</div>
```

## 3. Personalización del Estilo de Paginación

Por defecto, los enlaces de paginación de Laravel se renderizan utilizando los componentes estéticos de **Tailwind CSS**. Si prefieres usar **Bootstrap**, puedes indicarlo globalmente en el método `boot` de tu `app/Providers/AppServiceProvider.php`:

```php
use Illuminate\Pagination\Paginator;

public function boot(): void
{
    // Usar diseño compatible con Bootstrap
    Paginator::useBootstrapFive(); 
}
```

## 4. Publicación y Modificación de las Vistas de Paginación

Las vistas de paginado predeterminadas que utiliza el framework se encuentran ubicadas en la siguiente ruta del núcleo:

```text
/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php
```

Si necesitas modificar el diseño o la estructura HTML de los enlaces de paginación para adaptarlos completamente a tu proyecto, debes **personalizar la vista de paginado** publicando los archivos mediante el comando de Artisan `vendor:publish`:

```bash
php artisan vendor:publish --tag=laravel-pagination
```
```bash
   INFO  Publishing [laravel-pagination] assets.
  Copying directory [vendor/laravel/framework/src/Illuminate/Pagination/resources/views] to [resources/views/vendor/pagination]  DONE
```

Al ejecutar este comando, Laravel copiará las vistas predeterminadas dentro de tu directorio `resources/views/vendor/pagination/`. A partir de ese momento, podrás editar archivos como `tailwind.blade.php` o `bootstrap-5.blade.php` directamente según tus necesidades de diseño.