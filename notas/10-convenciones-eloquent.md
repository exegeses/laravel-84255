# Convenciones de Modelo de Eloquent
¿Qué es Eloquent?
Eloquent es el ORM (Object Relation Mapping) que utiliza Laravel para poder comunicar la aplicación con tablas de nuestra base de datos

Eloquent tiene ciertas convenciones para crear el modelo y para comunicarse con tablas

## Nombre de Modelo y de tabla 
Modelo en Pascal Case, debe comenzar en mayúscula
Además se utiliza el sistema de plurales
Esto significa que si tenemos una tabla que se llama "ventas" nuestro modelo deberá llamarse "Venta"
Esto resuelve la duda de cómo es queLaravel encuentra la tabla Ventas si nosotros no lo estamos escribiendo

Si nosotros quisiéramos tener una tabla con un nombre y un modelo con un nombre que no siga esta regla, se puede configurar en el mismo modelo
Por ejemplo si tenemos una tabla que se llama "proveedores" ahí nos encontramos con un problema idiomático, ya que el modelo según la convención debería llamarse "Proveedore"
Si estuviésemos una tabla llamada "regiones", el Model debería llamarse "Regione"

Para configurar esto en el módem podemos hacerlo de dos maneras

1. atributo protected "table"

```php
class Proveedor
{
    protected $table = 'proveedores';
}
```
```php
class Region
{
    protected $table = 'regiones';
}
```

2. Mediante atributos de PHP
Desde la versión 8 de PHP nos encontramos con atributos de PHP, Laravel implementa a partir de la versión 13 esta manera de declarar distintos atributos como por ejemplo el nombre de la tabla

```php
#[Table('proveedores')]
class Proveedor
{
    
}
```
```php
#[Table('regiones')]
class Region
{
    
}
```
    
## Nombre de primary key
Laravel asume que todas nuestras tablas tienen un primary key llamado "id"
Podemos modificar esto de dos maneras

1. atributo protected "primaryKey"

```php
class Proveedor
{
    protected $primaryKey = 'id_proveedor';
}
```        
2. Mediante atributos de PHP
```php
#[Table(key: 'id_proveedor')]
class Proveedor
{
}
```