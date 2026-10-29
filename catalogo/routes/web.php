<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::metodo('URI', [Controlador, 'metodo'])
###### dashboard de marcas
Route::get('/marcas', [MarcaController::class, 'index']);
Route::get('/marcas/create', [MarcaController::class, 'create']);
Route::post('/marcas/store', [MarcaController::class, 'store']);
Route::get('/marcas/{id}/edit', [MarcaController::class, 'edit']);
Route::put('/marcas/{id}/update', [MarcaController::class, 'update']);
Route::get('/marcas/{id}/confirm', [MarcaController::class, 'confirm']);
Route::delete('/marcas/{id}/delete', [MarcaController::class, 'destroy']);

###### dashboard de categorias

###### dashboard de productos
Route::get('/productos', [ProductoController::class, 'index']);
