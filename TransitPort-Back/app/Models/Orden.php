<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buque;
use App\Models\Contenedor;

class Orden extends Model
{
    protected $table = 'orden';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo','estado', 'cantidad_contenedores', 'visto', 'fecha_inicio', 'fecha_fin', 'id_administrativo', 'id_buque', 'id_contenedor', 'id_grua'];

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
    public function buque()
    {
        return $this->belongsTo(Buque::class, 'id_buque');
    }
    public function tiene()
    {
        return $this->hasOne(Tiene::class, 'id_buque');
    }
    public function zona()
    {
        return $this->hasOne(Zona::class, 'id');
    }
    public function contenedor()
    {
        return $this->hasOne(Contenedor::class, 'id');
    }
    public function administrativo()
    {
        return $this->belongsTo(Administrativo::class, 'id_administrativo');
    }
}
