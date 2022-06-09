<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listaUsuarios = Usuario::sortable()->paginate(3);

        return view('listarUsuarios', compact('listaUsuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('formularioUsuario');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $valores
     * @return \Illuminate\Http\Response
     */
    public function store(Request $valores)
    {
        
        $nuevoUsuario = new Usuario();

        $nuevoUsuario->nick = $valores->nick;
        $nuevoUsuario->nombre = $valores->nombre;
        $nuevoUsuario->apellidos = $valores->apellidos;
        $nuevoUsuario->email = $valores->email;
        $nuevoUsuario->password = sha1($valores->password);

        $imagenSubida = $valores->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('miblog/images', $nombreImagen);
        $nuevoUsuario->imagen = $nombreImagen;
  
        $nuevoUsuario->save();

        return redirect()->route('usuario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $usuarioDetallado = Usuario::find($id);

        if(is_null($usuarioDetallado)){

            return abort(404);
            
        }

        return view('listarUnUsuario', compact('usuarioDetallado'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuarioActualizado = Usuario::findorFail($id);

        return view('formularioActualizaUsuario', compact('usuarioActualizado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $valoresActualizados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $valoresActualizados, $usuarioActualizado)
    {
        
        $usuarioActualizado = Usuario::findorFail($usuarioActualizado);

        $usuarioActualizado->nombre = $valoresActualizados->nombre;
        $usuarioActualizado->apellidos = $valoresActualizados->apellidos;
        $usuarioActualizado->email = $valoresActualizados->email;

        $imagenSubida = $valoresActualizados->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('miblog/images', $nombreImagen);
        $usuarioActualizado->imagen = $nombreImagen;
  
        $usuarioActualizado->save();

        return redirect()->route('usuario.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $usuarioEliminado = Usuario::findorFail($id);

        $usuarioEliminado->delete();

        return redirect()->route('usuario.index');

    }
}