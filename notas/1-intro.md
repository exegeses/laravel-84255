# Introducción a Laravel 13
[1. Definición](#1-definición)  
[2. Requisitos](#2-requisitos-para-laravel-13)  
[3. Laravel Installer](#3-laravel-installer)  
[4. Chequeo de versiones](#5-actualización-de-versiones)  
[5. Actualización de versiones](#5-actualización-de-versiones)  

## 1. Definición
¿Qué es Laravel?
Laravel es un framework *progresivo* de desarrollo web, de código abierto para PHP, creado por Taylor Otwell en 2011. Está diseñado bajo el patrón de arquitectura MVC (Modelo-Vista-Controlador) y su objetivo principal es hacer que el proceso de desarrollo web sea rápido, elegante y agradable para el programador ("The PHP Framework for Web Artisans").

Laravel se encarga de resolver muchas tareas habituales del desarrollo web, como:

* Recibir y procesar solicitudes HTTP;
* Definir rutas;
* Trabajar con bases de datos;
* Gestionar usuarios y autenticación;
* Validar datos;
* Generar vistas;
* Gestionar sesiones;
* Crear APIs y gestionar webhooks

En lugar de construir cada una de estas funcionalidades desde cero, Laravel proporciona herramientas y una estructura organizada para desarrollar aplicaciones de manera más eficiente.

En pocas palabras:
> Laravel es un framework *progresivo* de PHP que proporciona
> una estructura y herramientas para desarrollar aplicaciones web.

## 2. Requisitos para Laravel 13

    - PHP ^8.3  
    - Composer ^2.8  
    - Laravel Installer ^5.25.0  

PHP >= 8.3 es el requisito principal de versión para Laravel 13.
Composer >= 2.8 es el gestor de dependencias de PHP.
Laravel Installer >= 5.25.0 es una herramienta de línea de comandos que permite crear nuevos proyectos Laravel de manera sencilla.


ℹ️ Opcionalmente NPM (Node Package Manager) es el administrador de paquetes de Node.js y se utiliza en Laravel para instalar y gestionar las dependencias necesarias para el desarrollo frontend.
En escencia para trabajar con Vite, que se encarga de procesar los archivos CSS y JavaScript de la aplicación.

## 3. Laravel installer
Para descargar el instalador dew Laravel debemos descargarlo con composer y agregarlo a las variables de entorno (PATH). De este modo estarás disponible desde cualquier directorio del sistema.

```bash
composer global require laravel/installer
```

### 4. Chequeo de versiones
En una terminal podemos escribir los siguientes comandos:

```php
php -v
```
```bash
composer --version
```
```bash
laravel installer --version
```

### 5. Actualización de versiones
PHP: dependera de la versión que tengas instalada
- [![Laravel Herd](./assets/herd.svg)](https://herd.laravel.com/)
- [![php.new](./assets/phpnew.png)](https://php.new/)

Composer: desde una terminal podemos utilizar este comando
```bash
composer self-update
```

Laravel Installer: cuando creemos un proyecto usando *laravel new* el propio instalador chequea versión y, si hay una nueva versión, sugiere la actualización.
