<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orden;
use App\Models\Operador;

class Turno extends Model {      
    protected $table = 'turno';
    protected $primaryKey = 'id';
    protected $fillable = ['id_orden', 'id_operador', 'fecha_inicio', 'fecha_fin'];

    public function ordenes() {
        return $this->belongsToMany(Orden::class);
    }
    public function operadores() {
        return $this->belongsToMany(Operador::class);
    }
}