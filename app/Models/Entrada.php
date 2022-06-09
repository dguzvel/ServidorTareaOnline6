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

    public $sortable = ['created_at'];

}
