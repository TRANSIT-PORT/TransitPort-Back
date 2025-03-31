<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Administrativo;

class Truck extends Model
{
    protected $table = 'trucks';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','matricula', 'aparcamiento', 'procedencia', 'destino', 'id_administrativo'];

    public function administrativos()
    {
        return $this->belongsToMany(Administrativo::class);
    }

    public function contenedores(){
        return $this->belongsToMany(Contenedor::class, 'tiene_truck', 'id_contenedor', 'id_truck')
                    ->withPivot('ubicacion', 'destino', 'tipo_destino')
                    ->withTimestamps(); 
    }
}
