<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Usuario extends Model
{
    use HasFactory;
    use Sortable;

    //Con $table se puede hacer referencia a la tabla de la base de datos con la que conecta el modelo
    protected $table = "users";

    //Es importante poner todos los campos en $fillable para que se puedan rellenar por completo mediante métodos como la importación Excel
    protected $fillable = [

        'nick',
        'nombre',
        'apellidos',
        'email',
        'password',
        'imagen',
        
    ];

    //Los campos en $sortable se pueden ordenar de manera ascendente y descendente
    public $sortable = ['nick'];

}
