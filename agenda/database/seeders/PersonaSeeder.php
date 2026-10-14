<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personas')->insert([
            [
                'id' => 1,
                'nombre' => 'Martina',
                'apellido' => 'Gómez',
                'dni' => '32456789',
                'telefono' => '1145678901',
                'nacimiento' => '1998-03-14',
            ],
            [
                'id' => 2,
                'nombre' => 'Lucas',
                'apellido' => 'Fernández',
                'dni' => '28901234',
                'telefono' => '1156789012',
                'nacimiento' => '2003-07-22',
            ],
            [
                'id' => 3,
                'nombre' => 'Camila',
                'apellido' => 'Rodríguez',
                'dni' => '35678123',
                'telefono' => '1167890123',
                'nacimiento' => '1994-11-05',
            ],
            [
                'id' => 4,
                'nombre' => 'Mateo',
                'apellido' => 'López',
                'dni' => '40123456',
                'telefono' => '1178901234',
                'nacimiento' => '1988-01-30',
            ],
            [
                'id' => 5,
                'nombre' => 'Sofía',
                'apellido' => 'Martínez',
                'dni' => '31234567',
                'telefono' => '1189012345',
                'nacimiento' => '1999-05-18',
            ],
            [
                'id' => 6,
                'nombre' => 'Joaquín',
                'apellido' => 'García',
                'dni' => '25678901',
                'telefono' => '1190123456',
                'nacimiento' => '2005-09-09',
            ],
            [
                'id' => 7,
                'nombre' => 'Valentina',
                'apellido' => 'Pérez',
                'dni' => '38901234',
                'telefono' => '1101234567',
                'nacimiento' => '1990-12-25',
            ],
            [
                'id' => 8,
                'nombre' => 'Nicolás',
                'apellido' => 'Sánchez',
                'dni' => '29456789',
                'telefono' => '1112345678',
                'nacimiento' => '2002-04-11',
            ],
            [
                'id' => 9,
                'nombre' => 'Julieta',
                'apellido' => 'Díaz',
                'dni' => '33789012',
                'telefono' => '1123456789',
                'nacimiento' => '1996-08-27',
            ],
            [
                'id' => 10,
                'nombre' => 'Tomás',
                'apellido' => 'Romero',
                'dni' => '42345678',
                'telefono' => '1134567890',
                'nacimiento' => '1985-02-16',
            ],
        ]);
    }
}
