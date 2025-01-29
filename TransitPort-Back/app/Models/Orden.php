<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buque;
use App\Models\Contenedor;

class Orden extends Model
{
    protected $table = 'orden';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo', 'cantidad_contenedores', 'fecha_carga', 'fecha_descarga', 'id_administrativo', 'id_buque', 'id_contenedor', 'id_grua'];

    public function administrativos()
    {
        return $this->belongsToMany(Administrativo::class);
    }
    public function buques()
    {
        return $this->belongsToMany(Buque::class);
    }
    public function contenedores()
    {
        return $this->belongsToMany(Contenedor::class);
    }
    public function gruas()
    {
        return $this->belongsToMany(Grua::class);
    }
}
