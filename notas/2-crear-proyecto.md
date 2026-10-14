# Creación de proyecto Laravel
[1. Creación de proyecto Laravel](#1-creación-de-proyecto-laravel)  
[2. Base de datos y configuración](#2-base-de-datos-y-configuración)  
[2.1. Base de datos SQLite](#21-base-de-datos-sqlite)  
[2.2. Base de datos MySQL](#22-base-de-datos-mysql)  
[3. Sesiones](#3-sesiones)  

# 1. Creación de proyecto Laravel
Para crear un proyecto Laravel vamos a correr el comando
```bash
laravel new nombre-proyecto
```
Éste comando va a lanzar el interactivo para la instalación
Una vez instalado debemos movernos a la carpeta del proyecto
```bash
cd nombre-proyecto
```
Y finalmente podemos ejecutarlo con el comando
```bash
composer run dev
```
## 2. Base de datos y configuración
Laravel tiene un archivo principal de configuración llamado .env
Ahí nos encontramos con toda la configuración general. Por otro lado también hay un directorio llamado config donde está la configuración secundaria.

### 2.1. Base de datos SQLite
De manera predeterminada, Laravel está configurado para una base de datos de tipo SQLite
```dotenv
DB_CONNECTION=sqlite
```
La base de datos que utiliza se llama *database.sqlite* y se encuentra en el directorio database
Si queremos cambiar el nombre de la base (usando SQLite) debemos ir al archivo de configuración de base de datos *config/database.php* y modificar
```php
'database' => env('DB_DATABASE', database_path('database.sqlite')),
```
por 
```php
'database' => env('DB_DATABASE', database_path('nombre-base.sqlite')),
```

### 2.2. Base de datos MySQL
Si queremos usar una base de datos MySQL debemos editar el archivo .env
Remplazamos
```dotenv
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```
Por:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mibase
DB_USERNAME=root
DB_PASSWORD=miclave
```
ℹ️ También podemos utilizar servidores de tipo mariadb, pgsql y sqlsrv
con sus puertos predeterminados 3306, 5432 y 1433 respectivamente.

⚠️ El servidor de bbdd debe estar corriendo y la base debe estar creada.

## 3. Sesiones
De manera predeterminada, Laravel almacena en las sesiones en la base de datos
```dotenv
SESSION_DRIVER=database
```
Cómo aún no existen las tablas necesarias, debemos correr migraciones para lograrlo. (crear las tablas sessions, cache, jobs, etc)
```bash
    php artisan migrate
```