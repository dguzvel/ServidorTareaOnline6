<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Usuario extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['nick'];

}
