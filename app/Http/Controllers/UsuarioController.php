<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{

    public function mostrarVista(){

        return view('formularioUsuario');

    }

    public function insertarUsuario(Request $valores){

        $nuevoUsuario = new Usuario();

        $nuevoUsuario->nick = $valores->nick;
        $nuevoUsuario->nombre = $valores->nombre;
        $nuevoUsuario->apellidos = $valores->apellidos;
        $nuevoUsuario->email = $valores->email;
        $nuevoUsuario->password = $valores->password;

        $imagenSubida = $valores->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('images', $nombreImagen);
        $nuevoUsuario->imagen = $nombreImagen;
  
        $nuevoUsuario->save();

        return redirect()->route('listarUsuarios');

    }

    public function listarUsuarios(){

        $listaUsuarios = Usuario::all();

        return view('listarUsuarios', compact('listaUsuarios'));

    }

    public function listarUnUsuario($id){

        $usuarioDetallado = Usuario::find($id);

        if(is_null($usuarioDetallado)){

            return abort(404);
            
        }

        return view('listarUnUsuario', compact('usuarioDetallado'));

    }

}
