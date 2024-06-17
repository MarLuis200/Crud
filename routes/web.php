<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\VentaController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::resource('personas', PersonasController::class);
Route::resource('marcas', MarcasController::class);
Route::resource('ventas', VentaController::class);


