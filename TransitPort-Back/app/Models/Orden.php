<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Administrativo;
use App\Models\Operador;
use App\Models\Buque;
use App\Models\Contenedor;

class Orden extends Model
{
    protected $table = 'orden';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo', 'cantidad_contenedores', 'fecha_inicio', 'fecha_fin', 'id_administrativo', 'id_operador', 'id_buque', 'id_zona', 'id_grua'];

    public function administrativos()
    {
        return $this->belongsToMany(Administrativo::class);
    }
    public function operador()
    {
        return $this->belongsToMany(Operador::class);
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
}
