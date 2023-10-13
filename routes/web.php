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

Route::get('/sobre-mi', [\App\Http\Controllers\HomeController::class, 'about']);

Route::get('/recetarios', [\App\Http\Controllers\RecetarioController::class, 'index']);

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index']);

Route::get('/admin/contenido', [\App\Http\Controllers\AdminContentController::class, 'index']);

//admin entradas de blog
Route::get('/admin/entradas-blog', [\App\Http\Controllers\AdminContentController::class, 'entradasBlog']);
Route::get('/admin/entradas-blog/nueva', [\App\Http\Controllers\AdminContentController::class, 'formCreateEntrada']);
Route::post('/admin/entradas-blog/nueva', [\App\Http\Controllers\AdminContentController::class, 'processCreateEntrada']);
Route::get('/admin/entradas-blog/{id}', [\App\Http\Controllers\AdminContentController::class, 'viewEntradaBlog'])
    ->whereNumber('id');

//admin recetarios
Route::get('/admin/recetarios', [\App\Http\Controllers\AdminContentController::class, 'recetarios']);
Route::get('/admin/recetarios/nueva', [\App\Http\Controllers\AdminContentController::class, 'formCreateRecetario']);
Route::post('/admin/recetarios/nueva', [\App\Http\Controllers\AdminContentController::class, 'processCreateRecetario']);
Route::get('/admin/recetarios/{id}', [\App\Http\Controllers\AdminContentController::class, 'viewRecetario'])
    ->whereNumber('id');
