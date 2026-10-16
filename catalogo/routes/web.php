<?php

use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

###### dashboard de marcas
Route::get('/marcas', [MarcaController::class, 'index']);
