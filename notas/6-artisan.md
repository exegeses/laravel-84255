# Artisan

Artisan es la interfaz de línea de comandos (CLI) que viene integrada en Laravel.

Para entendernos de forma sencilla: es como tu asistente personal o tu caja de herramientas mágica que ejecutamos desde la terminal para automatizar tareas aburridas o repetitivas.

En lugar de crear carpetas y archivos manualmente, o escribir código complejo para ciertas tareas, le damos órdenes a Artisan escribiendo comandos que empiezan por *php artisan*.

¿Para qué se usa principalmente?
Aquí tenemos algunos ejemplos de lo que podemos generar con Artisan todos los días:

Crear archivos automáticamente: En lugar de crear un archivo de controlador o base de datos a mano, ejecutamos:
```php
php artisan make:controller ProductController 
```

Manejar la base de datos:
```php
php artisan db:show
```
Muestra la información de la base de datos configutada en el proyecto
```php
php artisan db
```
Abre el cliente de SQLite para la base de datos configurada en el proyecto


Con comandos como php artisan migrate, le padimos a Laravel que cree o actualice las tablas en nuestra base de datos.

Limpiar la caché: Cuando implementamos cambios y la página no se actualiza, usamos comandos para "limpiar la memoria" del framework.
```php
php artisan cache:clear
```
 
En resumen: Artisan es muestro mejor amigo en la terminal para desarrollar más rápido y sin errores en Laravel. 
Si escribimos sólo php artisan en tu terminal y presionamos Enter, nos aparecerá una lista gigante con todos los superpoderes que tiene disponibles.


-----
Comandos SQLite:
```sql
-- ver todas las tablas:
.tables

-- ver el script de creación de la tabla personas
.schema personas
```

```sql
.mode column
.headers on
SELECT * FROM personas;
```