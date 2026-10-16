<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            'Apple',
            'Xiaomi',
            'Hisense',
            'Philips Hue',
            'Nanoleaf',
            'Aqara',
            'Eve',
            'TP-Link Kasa',
            'Withings',
            'Samsung',
            'Google',
            'Amazon',
            'Ecobee',
            'Govee',
            'TCL',
            'Meross',
        ];

        foreach ($marcas as $marca) {
            DB::table('marcas')
                    ->insert([ 'marca' => $marca ]);
        }
    }
}
