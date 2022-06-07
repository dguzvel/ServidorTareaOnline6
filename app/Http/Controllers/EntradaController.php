<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
class EntradaController extends Controller
{
    
    public function mostrarVistaEntrada(){

        return view('formularioEntrada');

    }

    public function insertarEntrada(Request $valores){

        $nuevaEntrada = new Entrada();

        $nuevaEntrada->usuario_id = 1;
        $nuevaEntrada->categoria_id = 2;
        $nuevaEntrada->titulo = $valores->titulo;

        $imagenSubida = $valores->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('images', $nombreImagen);
        $nuevaEntrada->imagen = $nombreImagen;

        $nuevaEntrada->descripcion = $valores->descripcion;
  
        $nuevaEntrada->save();

        return redirect()->route('listarEntradas');

    }

    public function listarEntradas(){

        $listaEntradas = Entrada::paginate(2);

        return view('listarEntradas', compact('listaEntradas'));

    }

    public function listarUnaEntrada($id){

        $entradaDetallada = Entrada::find($id);

        if(is_null($entradaDetallada)){

            return abort(404);
            
        }

        return view('listarUnaEntrada', compact('entradaDetallada'));

    }

    public function eliminarEntrada(Entrada $entradaEliminada){

        $entradaEliminada->delete();

        return redirect()->route('listarEntradas');

    }

    public function mostrarActualizarEntrada(Entrada $entradaActualizada){

        return view('formularioActualizaEntrada', compact('entradaActualizada'));

    }
    
    public function actualizarEntrada(Entrada $entradaActualizada, Request $valoresActualizados){

        $entradaActualizada->titulo = $valoresActualizados->titulo;

        $imagenSubida = $valoresActualizados->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('images', $nombreImagen);
        $entradaActualizada->imagen = $nombreImagen;

        $entradaActualizada->descripcion = $valoresActualizados->descripcion;
  
        $entradaActualizada->save();

        return redirect()->route('listarEntradas');

    }

}