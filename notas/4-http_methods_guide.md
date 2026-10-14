# Guía Completa de Métodos HTTP y su Relación con REST

Las **peticiones HTTP** (también conocidas como métodos o verbos) son las instrucciones que el cliente (por ejemplo, tu navegador o una aplicación móvil) le envía al servidor para indicarle **qué acción** desea realizar sobre un recurso.

---

## 1. El estándar REST y los Verbos HTTP

Una arquitectura **REST (Representational State Transfer)** es un estilo de diseño de software para servicios web que aprovecha al máximo el protocolo HTTP nativo. En una API RESTful, los métodos HTTP no son solo acciones al azar, sino que tienen un **significado semántico estricto** vinculado a las operaciones sobre los recursos (URLs):

*   **Recurso:** Representa una entidad de datos (por ejemplo, `/users`, `/products/5`).
*   **Verbo HTTP:** Define la operación a realizar sobre ese recurso.

---

## 2. Los Métodos Principales del CRUD (El 99% del uso diario)

Estos son los métodos que utilizarás constantemente al desarrollar aplicaciones web (como en Laravel con `Route::get`, `Route::post`, etc.):

### `GET` (Leer / Obtener)
*   **Propósito RESTful:** Solicita la representación de un recurso específico o una lista de recursos. **No debe modificar** ningún dato en el servidor (operación segura e idempotente).
*   **Ejemplo en Laravel:** `Route::get('/users', [UserController::class, 'index']);`
*   **Uso común:** Ver la lista de productos, abrir el perfil de un usuario, cargar una página web.

### `POST` (Crear)
*   **Propósito RESTful:** Envía nuevos datos para **crear** un nuevo recurso. Los datos suelen viajar en el cuerpo (*body*) de la petición de manera oculta y segura.
*   **Ejemplo en Laravel:** `Route::post('/users', [UserController::class, 'store']);`
*   **Uso común:** Registrarse en una web, enviar un formulario de contacto, crear un nuevo artículo en un blog.

### `PUT` / `PATCH` (Actualizar)
*   **Propósito RESTful:** Modifican un recurso existente.
    *   `PUT`: Reemplaza el recurso **por completo** (todos sus campos).
    *   `PATCH`: Realiza una **actualización parcial** (solo los campos que se envían).
*   **Ejemplo en Laravel:** `Route::put('/users/{id}', ...)` o `Route::patch('/users/{id}', ...)`.
*   **Uso común:** Editar datos de perfil, cambiar el estado de un pedido.

### `DELETE` (Eliminar)
*   **Propósito RESTful:** Solicita la **eliminación** de un recurso específico en el servidor.
*   **Ejemplo en Laravel:** `Route::delete('/users/{id}', [UserController::class, 'destroy']);`
*   **Uso común:** Borrar una foto, eliminar una cuenta de usuario, vaciar el carrito de compras.

---

## 3. Métodos Auxiliares y de Diagnóstico

Estos métodos existen a nivel de protocolo web y son gestionados principalmente por los navegadores, servidores web (como Nginx o Apache) y capas de seguridad:

*   **`HEAD`:** Idéntico a `GET`, pero el servidor **solo devuelve los encabezados (headers)** sin contenido. Sirve para verificar si un archivo existe o cuánto pesa antes de descargarlo.
*   **`OPTIONS`:** Consulta qué métodos o permisos están permitidos en una URL. Es fundamental en las políticas de seguridad **CORS** de las APIs modernas.
*   **`CONNECT`:** Convierte la petición en un túnel de datos transparente, utilizado comúnmente para conexiones **HTTPS a través de proxies**.
*   **`TRACE`:** Hace un eco de la petición recibida para diagnóstico de redes (generalmente desactivado por seguridad para evitar ataques XST).