<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;

class DomPDFController extends Controller
{
    
    //Devuelve una vista con un listado de todos los usuarios, como index del controlador de usuarios, pero sin paginar
    public function previaPDF(){

        $listaUsuarios = Usuario::all();

        return view('previaPDF', compact('listaUsuarios'));
    }

    //Devuelve la vista a través de la cual se formará y descargará el pdf
    public function conviertePDF(){

        $listaUsuarios = Usuario::all();

        $previaPDF = PDF::loadView('conviertePDF', compact('listaUsuarios'))->setOptions(['defaultFont' => 'sans-serif']);;
        return $previaPDF->download('listaUsuarios.pdf');

    }

}
