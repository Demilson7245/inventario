<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\productoController;

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

Route::controller(productoController::class)->group(function(){

    route::get('producto', 'principal')->name('producto.principal');

    route::get('producto/crear', 'crear')->name('producto.crear');

    route::post('producto','store')->name('producto.store');

    Route::get('producto/{variable}', 'mostrar')->name('producto.mostrar');

    route::get('producto/{producto}/edit', 'editar')->name('producto.editar');
    
    route::put('producto/{producto}','update')->name('producto.update');
    
    route::delete('producto/{id}', 'borrar')->name('producto.borrar');

    route::get('desactiva/{id}', 'desactivaproducto')->name('desactivapro');

    route::get('activa/{id}', 'activaproducto')->name('activapro');
});


    


