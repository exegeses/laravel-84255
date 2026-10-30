<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //métodos de relación
    public function marcas()
    {
        return $this->belongsTo(
            Marca::class,
            'id_marca',
            'id_marca'
        );
    }
}
