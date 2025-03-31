<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buque;
use App\Models\Contenedor;

class TieneBuque extends Model
{
    protected $table = 'tiene_buque';
    protected $fillable = ['id_buque', 'id_contenedor', 'ubicacion', 'destino', 'tipo_destino'];

    public function tiene()
    {
        return $this->belongsToMany(Buque::class, Contenedor::class);
    }
}
