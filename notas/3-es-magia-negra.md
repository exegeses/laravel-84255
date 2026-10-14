# Laravel es magia negra. 🧙‍♂️

Si en Laravel no hay un index.php, entonces ¿cómo es que primero el enrutador /routes/web.php funciona?

¡En realidad sí hay un archivo index.php! Lo que pasa es que está oculto dentro de la carpeta public/index.php.

Para entender cómo se conecta todo de manera muy sencilla, imagina que Laravel es un restaurante y la petición del usuario (como entrar a tu web) es un cliente:

La puerta de entrada (public/index.php):
Cuando un usuario escribe tu dirección web en el navegador, el servidor (Apache o Nginx) siempre busca por obligación una carpeta llamada public y entra directo al archivo index.php. Ese archivo es como el recepcionista que recibe al cliente y dice: "¡Hay que abrir el restaurante!".

El encendido de la cocina (bootstrap/app.php):
Inmediatamente, ese index.php llama a la carpeta bootstrap para encender los motores de Laravel, cargar la configuración, conectar la base de datos y preparar todo lo necesario.

El mapa de navegación (routes/web.php):
Una vez que Laravel ya está encendido y listo, revisa el archivo routes/web.php. Este archivo funciona como un mapa o un directorio telefónico. 
Laravel lo lee para decir: "Ah, el cliente pidió la página principal (/), así que voy a mostrarle lo que dice esta ruta".

En resumen:
Todo pasa a través de public/index.php (que actúa como el único punto de acceso web). Este enciende el sistema mediante la carpeta bootstrap y, finalmente, consulta tu archivo routes/web.php para saber qué mostrar en pantalla.