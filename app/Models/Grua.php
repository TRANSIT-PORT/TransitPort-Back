<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestor;

class Grua extends Model
{
    protected $table = 'grua';
    protected $primaryKey = 'id';
    protected $fillable = ['capacidad_carga', 'estado', 'id_gestor'];

    public function gestores()
    {
        return $this->belongsToMany(Gestor::class);
    }
}
