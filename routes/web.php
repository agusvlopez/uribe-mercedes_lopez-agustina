<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/quienes-somos', [\App\Http\Controllers\HomeController::class, 'about']);

Route::get('/recetario/recetas', [\App\Http\Controllers\RecetarioController::class, 'index']);

Route::get('/admin/contenido', [\App\Http\Controllers\AdminContentController::class, 'index']);
