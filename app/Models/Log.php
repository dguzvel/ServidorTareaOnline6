<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = "logs";

    //Se van a rellenar los campos mediante insert cuando se lleve a cabo alguna operación del CRUD
    protected $fillable = [

        'id',
        'operacion',
        'created_at',
        'updated_at'
        
    ];

}
