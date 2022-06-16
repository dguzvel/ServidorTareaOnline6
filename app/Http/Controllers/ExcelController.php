<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuariosExport;
use App\Imports\UsuariosImport;

class ExcelController extends Controller
{
    
    //Devuelve la vista previa de los usuarios que serán exportados en formato xlsx
    public function previaExcel(){

        $listaUsuarios = Usuario::all();

        return view('previaExcel', compact('listaUsuarios'));
    }

    //Descarga del contenido de la función collection (el contenido de la tabla users) en formato xlsx
    public function exportar(){

        return Excel::download(new UsuariosExport, 'usuarios.xlsx');

    }

    //Importa y añade a la table users el contenido del excel
    public function importar(Request $request){

        if($request->hasFile('excel')){

            Excel::import(new UsuariosImport, 'usuarios.xlsx');

            return redirect()->route('previaExcel');

        }

    }

}
