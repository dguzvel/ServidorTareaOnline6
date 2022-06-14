<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidarRequest;
use App\Http\Requests\ValidarActuRequest;
use Carbon\Carbon;

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
     * @param  App\Http\Requests\ValidarRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarRequest $valores)
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

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha agregado un nuevo Usuario con Nick: '.$valores->nick,
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

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

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha visto en detalle al Usuario con Nick: '.$usuarioDetallado->nick,
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

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
     * @param  App\Http\Requests\ValidarActuRequest $valoresActualizados
     * @return \Illuminate\Http\Response
     */
    public function update(ValidarActuRequest $valoresActualizados, $usuarioActualizado)
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

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha actualizado al Usuario con Nick: '.$usuarioActualizado->nick,
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

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

        $operacion = [

            'id'         => NULL,
            'operacion'  => 'Se ha eliminado al Usuario con Nick: '.$usuarioEliminado->nick,
            'created_at' => Carbon::now(),
            'updated_at' => now()
            
        ];

        DB::table('logs')->insert($operacion);

        return redirect()->route('usuario.index');

    }

    public function search()
    {
        
        $textoBusca = $_GET['busqueda'];

        $usuariosBuscados = Usuario::where('nick','LIKE','%'.$textoBusca.'%')->get();

        return view('listarUsuariosBuscados', compact('usuariosBuscados'));

    }

}