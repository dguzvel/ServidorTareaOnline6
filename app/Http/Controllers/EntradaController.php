<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $listaEntradas = Entrada::sortable()->paginate(2);

        return view('listarEntradas', compact('listaEntradas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('formularioEntrada');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $valores
     * @return \Illuminate\Http\Response
     */
    public function store(Request $valores)
    {
        
        $nuevaEntrada = new Entrada();

        $nuevaEntrada->usuario_id = 1;
        $nuevaEntrada->categoria_id = 2;
        $nuevaEntrada->titulo = $valores->titulo;

        $imagenSubida = $valores->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('miblog/images', $nombreImagen);
        $nuevaEntrada->imagen = $nombreImagen;

        $nuevaEntrada->descripcion = $valores->descripcion;
  
        $nuevaEntrada->save();

        //En diferentes funciones aparecerá un array llamado $operacion que inserta una serie de valores en la tabla logs, haciendo referencia a la función en uso
        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha agregado una nueva Entrada por parte del usuario: 1',
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

        return redirect()->route('entrada.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $entradaDetallada = Entrada::find($id);

        if(is_null($entradaDetallada)){

            return abort(404);
            
        }

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha visto en detalle la Entrada con titulo: '.$entradaDetallada->titulo,
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

        return view('listarUnaEntrada', compact('entradaDetallada'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $entradaActualizada = Entrada::findorFail($id);

        return view('formularioActualizaEntrada', compact('entradaActualizada'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $valoresActualizados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $valoresActualizados, $entradaActualizada)
    {
        
        $entradaActualizada = Entrada::findorFail($entradaActualizada);

        $entradaActualizada->titulo = $valoresActualizados->titulo;

        $imagenSubida = $valoresActualizados->imagen;
        $nombreImagen = $imagenSubida->getClientOriginalName();
        $imagenSubida->move('miblog/images', $nombreImagen);
        $entradaActualizada->imagen = $nombreImagen;

        $entradaActualizada->descripcion = $valoresActualizados->descripcion;
  
        $entradaActualizada->save();

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha actualizado una Entrada',
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

        return redirect()->route('entrada.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $entradaEliminada = Entrada::findorFail($id);

        $entradaEliminada->delete();

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha eliminado una Entrada',
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

        return redirect()->route('entrada.index');

    }

    public function search()
    {
        
        $textoBusca = $_GET['busqueda'];

        $entradasBuscadas = Entrada::where('descripcion','LIKE','%'.$textoBusca.'%')->get();

        return view('listarEntradasBuscadas', compact('entradasBuscadas'));

    }

}