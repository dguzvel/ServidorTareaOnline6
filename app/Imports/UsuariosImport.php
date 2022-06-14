<?php

namespace App\Imports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\ToModel;

class UsuariosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Usuario([

            'nick'      => $row[0],
            'nombre'    => $row[1], 
            'apellidos' => $row[2],
            'email'     => $row[3],
            'password'  => sha1($row[4]),
            'imagen'    => $row[5]
            
        ]);
    }
}
