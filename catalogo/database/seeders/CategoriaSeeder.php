<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Smartphones',
            'Computadoras',
            'Smart TV',
            'Iluminación inteligente',
            'Enchufes inteligentes',
            'Altavoces inteligentes',
            'Cerraduras inteligentes',
            'Estaciones meteorológicas',
            'Domótica y automatización',
            'Tablets',
            'Accesorios',
            'Cámaras de seguridad',
            'Termostatos inteligentes',
            'Audio',
            'Sensores inteligentes',
            'Monitores y displays',
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert(['categoria' => $categoria]);
        }
    }
}
