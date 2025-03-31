<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Train;
use App\Models\Contenedor;

class TieneTrain extends Model
{
    protected $table = 'tiene_train';
    protected $fillable = ['id_train', 'id_contenedor', 'ubicacion', 'destino', 'tipo_destino'];

    public function tiene()
    {
        return $this->belongsToMany(Train::class, Contenedor::class);
    }
}
