# Guía Definitiva: Validación de Registros en Laravel

La validación de datos es un pilar crítico en cualquier aplicación web segura y robusta. Laravel ofrece un enfoque extremadamente rico y flexible para validar los datos entrantes de tus solicitudes (`requests`), permitiéndote mantener el código limpio y protegido contra entradas maliciosas o incorrectas.

## 1. Validación Básica con Controladores

El método más directo para validar una solicitud HTTP es utilizando el método `validate` disponible en cualquier instancia de `Illuminate\Http\Request`.

### Paso 1: Definir las reglas en el Controlador

Si la validación falla, Laravel automáticamente generará una respuesta de redirección hacia la página anterior con los errores correspondientes guardados en la sesión. Si es una petición AJAX/API, devolverá una respuesta JSON con código `422 Unprocessable Entity`.

```php
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

public function store(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'titulo' => 'required|unique:posts|max:255',
        'cuerpo' => 'required',
        'email_contacto' => 'required|email',
        'edad' => 'nullable|integer|min:18',
    ]);

    // El código continúa solo si la validación fue exitosa
    // $validatedData contiene únicamente los campos validados y seguros

    return redirect()->route('posts.index')->with('success', 'Publicación creada con éxito.');
}
```

## 2. Validación mediante Form Requests (Recomendado para Aplicaciones Complejas)

Para mantener los controladores limpios y reutilizar la lógica de validación, Laravel permite crear clases dedicadas llamadas **Form Requests**.

### Paso 1: Generar el Form Request

Ejecuta el siguiente comando Artisan para crear una clase de solicitud personalizada:

```bash
php artisan make:request StorePostRequest
```

Esto creará un archivo en `app/Http/Requests/StorePostRequest.php`.

### Paso 2: Configurar la Autorización y las Reglas

Abre el archivo generado y ajusta el método `authorize` (cámbialo a `true` si cualquier usuario puede realizar la petición o implementa lógica de permisos) y define tus reglas en el método `rules`:

```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir la petición (o evaluar lógica de roles)
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255', 'unique:posts'],
            'cuerpo' => ['required', 'string'],
            'categoria_id' => ['required', 'exists:categorias,id'],
        ];
    }
}
```

### Paso 3: Inyectar el Form Request en el Controlador

Reemplaza `Request` por tu clase personalizada en los parámetros del método del controlador:

```php
use App\Http\Requests\StorePostRequest;

public function store(StorePostRequest $request): RedirectResponse
{
    // Los datos ya están validados automáticamente antes de entrar aquí
    $validated = $request->validated();

    Post::create($validated);

    return redirect()->route('posts.index');
}
```

## 3. Mostrar Errores de Validación en las Vistas Blade

Si estás construyendo una interfaz con Blade, puedes mostrar los mensajes de error utilizando la variable global `$errors` compartida con todas las vistas:

```html
<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        
        @error('titulo')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="cuerpo">Cuerpo:</label>
        <textarea id="cuerpo" name="cuerpo">{{ old('cuerpo') }}</textarea>
        
        @error('cuerpo')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Guardar</button>
</form>
```

> **Nota:** El helper `old('nombre_campo')` es fundamental para retener los valores que el usuario ingresó previamente en el formulario cuando la validación falla, mejorando notablemente la experiencia de usuario.