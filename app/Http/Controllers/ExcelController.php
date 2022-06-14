<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuariosExport;
use App\Imports\UsuariosImport;

class ExcelController extends Controller
{
    
    public function previaExcel(){

        $listaUsuarios = Usuario::all();

        return view('previaExcel', compact('listaUsuarios'));
    }

    public function exportar(){

        return Excel::download(new UsuariosExport, 'usuarios.xlsx');

    }

    public function importar(Request $request){

        if($request->hasFile('excel')){

            Excel::import(new UsuariosImport, 'usuarios.xlsx');

            return redirect()->route('previaExcel');

        }

    }

}
