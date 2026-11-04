<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    //métodos de relación
    public function marcas() : belongsTo
    {
        return $this->belongsTo(
            Marca::class,
            'id_marca',
            'id_marca'
        );
    }

    public function categorias() : belongsTo
    {
        return $this->belongsTo(
            Categoria::class,
            'id_categoria',
            'id_categoria'
        );
    }
}
