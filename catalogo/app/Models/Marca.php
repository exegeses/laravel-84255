<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(key: 'id_marca', timestamps: false)]
class Marca extends Model
{
    # protected $table = 'nombre_custom'
    # protected $primaryKey = 'id_marca';
    # public $timestamps = false;

    // método de relación
    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'id_marca',
            'id_marca'
        );
    }
}
