# Métodos de Relación Eloquent en Laravel 13

Eloquent es el ORM (Object-Relational Mapper) incluido por defecto en Laravel. Facilita la interacción con tu base de datos mediante una sintaxis orientada a objetos clara y expresiva. En Laravel 13, las relaciones Eloquent siguen potenciando la legibilidad, aprovechando las últimas características de PHP y optimizando el rendimiento con carga diferida y ansiosa (*lazy and eager loading*).

---

## 1. Relación Uno a Uno (One to One)

Se utiliza cuando un registro de un modelo está asociado exactamente con un registro de otro modelo. Por ejemplo, un usuario (`User`) tiene un solo perfil (`Profile`).

### Definición en el modelo `User`:
```php
public function profile(): HasOne
{
    return $this->hasOne(Profile::class);
}
```

### Definición en el modelo inverso (`Profile`):
```php
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
```

---

## 2. Relación Uno a Muchos (One to Many)

Es una de las relaciones más comunes. Un registro principal posee múltiples registros secundarios. Por ejemplo, una publicación (`Post`) tiene muchos comentarios (`Comment`).

### Definición en el modelo `Post`:
```php
public function comments(): HasMany
{
    return $this->hasMany(Comment::class);
}
```

### Definición en el modelo inverso (`Comment`):
```php
public function post(): BelongsTo
{
    return $this->belongsTo(Post::class);
}
```

---

## 3. Relación Muchos a Muchos (Many to Many)

Se presenta cuando múltiples registros de un modelo se relacionan con múltiples registros de otro modelo a través de una tabla intermedia (*pivot table*). Por ejemplo, un usuario (`User`) puede tener muchos roles (`Role`), y un rol puede pertenecer a muchos usuarios.

### Definición en el modelo `User`:
```php
public function roles(): BelongsToMany
{
    return $this->belongsToMany(Role::class);
}
```

### Definición en el modelo inverso (`Role`):
```php
public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class);
}
```

---

## 4. Relaciones Polimórficas (Polymorphic Relations)

Permiten que un modelo pertenezca a más de un tipo de modelo utilizando una sola asociación. Por ejemplo, tanto una publicación (`Post`) como un video (`Video`) pueden tener comentarios (`Comment`) compartidos.

### Definición en el modelo dependiente (`Comment`):
```php
public function commentable(): MorphTo
{
    return $this->morphTo();
}
```

### Definición en los modelos principales (`Post` / `Video`):
```php
public function comments(): MorphMany
{
    return $this->morphMany(Comment::class, 'commentable');
}
```

---

## 5. Buenas Prácticas y Rendimiento

* **Carga Ansiosa (*Eager Loading*):** Utiliza siempre el método `with()` para prevenir el problema de consultas N+1:
  ```php
  $posts = Post::with('comments')->get();
  ```
* **Tipado estricto:** Aprovecha las declaraciones de tipos de retorno en tus métodos de relación (`HasMany`, `BelongsTo`, etc.) para mejorar el análisis estático y la robustez de tu código.