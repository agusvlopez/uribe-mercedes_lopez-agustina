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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/sobre-mi', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

//Autenticación
Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])
    ->name('auth.login.form');
Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])
    ->name('auth.login.process');
Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogout'])
    ->name('auth.logout.process');

Route::get('/registro', [\App\Http\Controllers\AuthController::class, 'formRegister'])
    ->name('auth.register.form');
Route::post('/registro', [\App\Http\Controllers\AuthController::class, 'processRegister'])
    ->name('auth.register.process');

//Usuario
Route::get('/usuario/{id}', [\App\Http\Controllers\UsuarioController::class, 'viewUser'])
    ->whereNumber('id')
    ->name('user.view');

Route::get('/usuario/{id}/editar', [\App\Http\Controllers\UsuarioController::class, 'formEditUser'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('user.form.edit');

Route::post('/usuario/{id}/editar', [\App\Http\Controllers\UsuarioController::class, 'processEditUser'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('user.process.edit');

//Recetarios
Route::get('/recetarios', [\App\Http\Controllers\RecetarioController::class, 'index'])
    ->name('recetarios.index');

Route::get('/recetarios/{id}', [\App\Http\Controllers\RecetarioController::class, 'viewRecetario'])
    ->whereNumber('id')
    ->name('recetario.view');

//Blog
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{id}', [\App\Http\Controllers\BlogController::class, 'viewEntradaBlog'])
    ->whereNumber('id')
    ->name('blog.view');

Route::get('/blog/clasification/{id}', [\App\Http\Controllers\BlogController::class, 'viewBlogClasification'])
    ->whereNumber('id')
    ->name('blog.clasification.view');

//Admin
// Route::get('/admin/verificar-rol',[\App\Http\Controllers\RoleVerificationController::class, 'formRole'])
//     ->name('admin.role-verification.form');
Route::get('/admin/contenido', [\App\Http\Controllers\AdminContentController::class, 'index'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.index');

//Admin entradas de blog
Route::get('/admin/entradas-blog', [\App\Http\Controllers\AdminContentController::class, 'entradasBlog'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog');

Route::get('/admin/entradas-blog/nueva', [\App\Http\Controllers\AdminContentController::class, 'formCreateEntrada'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog.form.create');

Route::post('/admin/entradas-blog/nueva', [\App\Http\Controllers\AdminContentController::class, 'processCreateEntrada'])
    ->middleware(['auth'])
    ->name('admin.blog.process.create');

Route::get('/admin/entradas-blog/{id}', [\App\Http\Controllers\AdminContentController::class, 'viewEntradaBlog'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog.view');

Route::get('/admin/entradas-blog/{id}/eliminar', [\App\Http\Controllers\AdminContentController::class, 'formDeleteEntrada'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog.form.delete');

Route::post('/admin/entradas-blog/{id}/eliminar', [\App\Http\Controllers\AdminContentController::class, 'processDeleteEntrada'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog.process.delete');

Route::get('/admin/entradas-blog/{id}/editar', [\App\Http\Controllers\AdminContentController::class, 'formEditEntrada'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog.form.edit');

Route::post('/admin/entradas-blog/{id}/editar', [\App\Http\Controllers\AdminContentController::class, 'processEditEntrada'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.blog.process.edit');


//Admin recetarios
Route::get('/admin/recetarios', [\App\Http\Controllers\AdminContentController::class, 'recetarios'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios');

Route::get('/admin/recetarios/nueva', [\App\Http\Controllers\AdminContentController::class, 'formCreateRecetario'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.form.create');

Route::post('/admin/recetarios/nueva', [\App\Http\Controllers\AdminContentController::class, 'processCreateRecetario'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.process.create');

Route::get('/admin/recetarios/{id}', [\App\Http\Controllers\AdminContentController::class, 'viewRecetario'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.view');

Route::get('/admin/recetarios/{id}/eliminar', [\App\Http\Controllers\AdminContentController::class, 'formDeleteRecetario'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.form.delete');

Route::post('/admin/recetarios/{id}/eliminar', [\App\Http\Controllers\AdminContentController::class, 'processDeleteRecetario'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.process.delete');

Route::get('/admin/recetarios/{id}/editar', [\App\Http\Controllers\AdminContentController::class, 'formEditRecetario'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.form.edit');

Route::post('/admin/recetarios/{id}/editar', [\App\Http\Controllers\AdminContentController::class, 'processEditRecetario'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.recetarios.process.edit');

//Admin usuarios
Route::get('/admin/usuarios', [\App\Http\Controllers\AdminContentController::class, 'users'])
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.users');

Route::get('/admin/usuarios/{id}', [\App\Http\Controllers\AdminContentController::class, 'viewUser'])
    ->whereNumber('id')
    ->middleware(['auth'])
    ->middleware(['user-role:admin'])
    ->name('admin.users.view');

//Mercado pago
Route::get('/pago', [\App\Http\Controllers\MercadoPagoController::class, 'showForm'])
    ->name('mp.pago');
Route::get('/pago/exito', [\App\Http\Controllers\MercadoPagoController::class, 'success'])
    ->name('mp.success');
Route::get('/pago/pendiente', [\App\Http\Controllers\MercadoPagoController::class, 'pending'])
    ->name('mp.pending');
Route::get('/pago/error', [\App\Http\Controllers\MercadoPagoController::class, 'failure'])
    ->name('mp.failure');
