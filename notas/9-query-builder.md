# Laravel Query Builder

**Query Builder** (Constructor de consultas) de Laravel es una herramienta elegante y fluida que te permite interactuar con la base de datos utilizando métodos de PHP en lugar de escribir código SQL puro.

## Características principales
*   **Seguridad:** Protege tu aplicación contra ataques de inyección SQL utilizando parámetros enlazados automáticamente.
*   **Independencia del motor:** Funciona de la misma manera sin importar si usas MySQL, PostgreSQL, SQLite o SQL Server.
*   **Sintaxis fluida:** Permite encadenar métodos de forma legible para construir consultas complejas paso a paso.

## Ejemplo básico
```php
use Illuminate\Support\Facades\DB;

// Obtener todos los usuarios cuyo estatus sea activo
$usuarios = DB::table('users')
                ->where('status', 'active')
                ->get();
```

## Métodos comunes de consulta

* `DB::table('nombre_tabla')`: Selecciona la tabla con la que vas a trabajar.
* `->get()`: Devuelve una colección con todos los resultados.
* `->first()`: Devuelve únicamente el primer registro que coincida.
* `->where('columna', 'valor')`: Filtra los datos (equivale al `WHERE` de SQL).
* `->insert([...])`: Inserta un nuevo registro.
* `->update([...])`: Actualiza registros existentes.
* `->delete()`: Elimina registros de la tabla.
