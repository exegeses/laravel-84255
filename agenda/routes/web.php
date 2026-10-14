<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

# Route::metodo(petición, acci´ón)
Route::get('/tradicion', function ()
{
    return 'Hola mundo desde Laravel';
});
Route::get('/vista', function ()
{
    $personajes = [
        'Rick Sánchez'=>'verif',
        'Morty Smith'=>'verif',
        'Summer Smith'=>'verif',
        'Beth Sánchez'=>'no verif',
        'Jerry Smith'=>'desactivado',
    ];
    return view('vista',
                [
                    'numero' => 5,
                    'personajes' => $personajes,
                ]
            );
});

/* obtener datos de base (tabla personas) */
Route::get('/', [PersonaController::class, 'index']);
Route::get('/create', [PersonaController::class, 'create']);
Route::post('/store', [PersonaController::class, 'store']);
Route::get('/edit/{id}', [PersonaController::class, 'edit']);
Route::put('/update/{id}', [PersonaController::class, 'update']);
Route::get('/confirm/{id}', [PersonaController::class, 'confirm']);
Route::delete('/delete/{id}', [PersonaController::class, 'destroy']);
