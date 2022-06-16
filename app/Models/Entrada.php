<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Entrada extends Model
{
    use HasFactory;

    //protected $table = "entradas";

    use Sortable;

    //Los campos en $sortable se pueden ordenar de manera ascendente y descendente
    public $sortable = ['created_at'];

}
