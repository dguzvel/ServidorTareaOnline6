<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;

class DomPDFController extends Controller
{
    
    public function previaPDF(){

        $listaUsuarios = Usuario::all();

        return view('previaPDF', compact('listaUsuarios'));
    }

    public function conviertePDF(){

        $listaUsuarios = Usuario::all();

        $previaPDF = PDF::loadView('conviertePDF', compact('listaUsuarios'))->setOptions(['defaultFont' => 'sans-serif']);;
        return $previaPDF->download('listaUsuarios.pdf');

    }

}
