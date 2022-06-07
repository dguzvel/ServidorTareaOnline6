<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EntradaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|
| Route::get('/', function () {
|   return view('welcome');
| });
|
*/

Route::get('/', function(){
    return view('login');
});

Route::get('miblog', function(){
    return view('inicio');
})->name('inicio');

/*
|
| Route::get('miblog/registrousuario', [UsuarioController::class, 'mostrarVista']);
| Route::post('miblog/registrousuario', [UsuarioController::class, 'insertarUsuario'])->name('insertarUsuario');
| Route::get('miblog/listarusuarios', [UsuarioController::class, 'listarUsuarios'])->name('listarUsuarios');
|
*/

Route::controller(UsuarioController::class)->group(function() {
    Route::get('miblog/registrousuario', 'mostrarVista')->name('mostrarVista');
    Route::post('miblog/registrousuario', 'insertarUsuario')->name('insertarUsuario');
    Route::get('miblog/listarusuarios', 'listarUsuarios')->name('listarUsuarios');
    Route::get('miblog/listarUnUsuario/id={id}', 'listarUnUsuario')->name('listarUnUsuario');
    Route::get('miblog/{usuarioEliminado}', 'eliminarUsuario')->name('eliminarUsuario');
    Route::get('miblog/formularioActualizaUsuario/{usuarioActualizado}', 'mostrarActualizar')->name('mostrarActualizar');
    Route::put('miblog/{usuarioActualizado}', 'actualizarUsuario')->name('actualizarUsuario');
});

Route::controller(EntradaController::class)->group(function() {
    Route::get('miblog/registroentrada', 'mostrarVistaEntrada')->name('mostrarVistaEntrada');
    Route::post('miblog/registroentrada', 'insertarEntrada')->name('insertarEntrada');
    Route::get('miblog/listarentradas', 'listarEntradas')->name('listarEntradas');
    Route::get('miblog/listarUnaEntrada/id={id}', 'listarUnaEntrada')->name('listarUnaEntrada');
    Route::get('miblog/{entradaEliminada}', 'eliminarEntrada')->name('eliminarEntrada');
    Route::get('miblog/formularioActualizaEntrada/{entradaActualizada}', 'mostrarActualizarEntrada')->name('mostrarActualizarEntrada');
    Route::put('miblog/{entradaActualizada}', 'actualizarEntrada')->name('actualizarEntrada');
});