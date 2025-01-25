<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class STS extends Model
{
    protected $table = 'sts';
    protected $primaryKey = 'id_grua';
    protected $fillable = ['capacidad_carga', 'estado', 'zona'];
}
