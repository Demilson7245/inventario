<?php

use App\Http\Controllers\categoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\profileController;

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
Route::get('/', inicioController::class);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
   Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

  // Route::get('/', inicioController::class);

   Route::get('producto', [productoController::class, 'principal'])->name('producto.principal');
   Route::get('producto/crear', [productoController::class, 'crear'])->name('producto.crear');
   Route::post('producto', [productoController::class, 'store'])->name('producto.store');
   Route::get('producto/{variable}', [productoController::class, 'mostrar'])->name('producto.mostrar');
   Route::get('producto/{producto}/edit', [productoController::class, 'editar'])->name('producto.editar');
   Route::put('producto/{producto}', [productoController::class, 'update'])->name('producto.update');
   Route::delete('producto/{id}', [productoController::class, 'borrar'])->name('producto.borrar');
   Route::get('desactiva/{id}', [productoController::class, 'desactivaproducto'])->name('desactivapro');
   Route::get('activa/{id}', [productoController::class, 'activaproducto'])->name('activapro');

   Route::get('categoria', [categoriaController::class, 'principal'])->name('categoria.principal');
   Route::get('categoria/crear', [categoriaController::class, 'crear'])->name('categoria.crear');
   Route::post('categoria', [categoriaController::class, 'store'])->name('categoria.store');
   Route::get('categoria/{variable}', [categoriaController::class, 'mostrar'])->name('categoria.mostrar');
   Route::get('categoria/{categoria}/edit', [categoriaController::class, 'editar'])->name('categoria.editar');
   Route::put('categoria/{categoria}', [categoriaController::class, 'update'])->name('categoria.update');
   Route::delete('categoria/{id}', [categoriaController::class, 'borrar'])->name('categoria.borrar');
   Route::get('desactiva-categoria/{id}', [categoriaController::class, 'desactivacategoria'])->name('desactivacat');
   Route::get('activa-categoria/{id}', [categoriaController::class, 'activacategoria'])->name('activacat');

   Route::get('role', [roleController::class, 'principal'])->name('role.principal');
   Route::get('role/crear', [roleController::class, 'crear'])->name('role.crear');
   Route::post('role', [roleController::class, 'store'])->name('role.store');
   Route::get('role/{variable}', [roleController::class, 'mostrar'])->name('role.mostrar');
   Route::get('role/{role}/edit', [roleController::class, 'editar'])->name('role.editar');
   Route::put('role/{role}', [roleController::class, 'update'])->name('role.update');
   Route::delete('role/{id}', [roleController::class, 'borrar'])->name('role.borrar');
   Route::get('desactiva-role/{id}', [roleController::class, 'desactivarole'])->name('desactivarol');
   Route::get('activa-role/{id}', [roleController::class, 'activarole'])->name('activarol');
   
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'principal')->name('profile.principal');
        Route::get('profile/crear', 'crear')->name('profile.crear');
        Route::post('profile', 'store')->name('profile.store');
        Route::get('profile/{variable}', 'mostrar')->name('profile.mostrar');
        Route::get('profile/{profile}/edit', 'editar')->name('profile.editar');
        Route::put('profile/{profile}', 'update')->name('profile.update');
        Route::delete('profile/{id}', 'destroy')->name('profile.borrar');
        Route::get('desactiva-profile/{id}', 'desactivar')->name('desactivarprofile');
        Route::get('activa-profile/{id}', 'activar')->name('activarprofile');
    });
});


