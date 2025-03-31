<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Truck;
use App\Models\Contenedor;

class TieneTruck extends Model
{
    protected $table = 'tiene_truck';
    protected $fillable = ['id_truck', 'id_contenedor', 'ubicacion', 'destino', 'tipo_destino'];

    public function tiene()
    {
        return $this->belongsToMany(Truck::class, Contenedor::class);
    }
}
