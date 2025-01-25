<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SC extends Model
{
    protected $table = 'sc';
    protected $primaryKey = 'id_grua';
    protected $fillable = ['capacidad_carga'];
}
