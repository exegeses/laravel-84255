<?php

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


Route::get('/',[ProductoController::class,'portada']);

/* Paneles de administración (solo usuarios logueados) */
Route::middleware('auth')->group( function () {
    ## dashboard al autologin
    Route::view('/dashboard', 'dashboard');
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
    Route::get('/productos/create', [ProductoController::class, 'create']);
    Route::post('/productos/store', [ProductoController::class, 'store']);
    Route::get('/productos/{id}/edit', [ProductoController::class, 'edit']);
    Route::put('/productos/{id}/update', [ProductoController::class, 'update']);
    Route::get('/productos/{id}/confirm', [ProductoController::class, 'confirm']);

    // logout
    Route::post('/logout', [LoginController::class, 'logout']);
});

/*##### Registo de usuarios ############*/
Route::get('/registro', [RegisterController::class, 'create']);
Route::post('/registro', [RegisterController::class, 'store']);
/*## formulario de login*/
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

