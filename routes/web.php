<?php

use App\Http\Controllers\UsuarioController;
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
});

/*
|
| Route::get('miblog/registrousuario', [UsuarioController::class, 'mostrarVista']);
| Route::post('miblog/registrousuario', [UsuarioController::class, 'insertarUsuario'])->name('insertarUsuario');
| Route::get('miblog/listarusuarios', [UsuarioController::class, 'listarUsuarios'])->name('listarUsuarios');
|
*/

Route::controller(UsuarioController::class)->group(function() {
    Route::get('miblog/registrousuario', 'mostrarVista');
    Route::post('miblog/registrousuario', 'insertarUsuario')->name('insertarUsuario');
    Route::get('miblog/listarusuarios', 'listarUsuarios')->name('listarUsuarios');
});