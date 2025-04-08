<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestor;
use App\Models\Operador;

class Grua extends Model
{
    protected $table = 'grua';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'modelo', 'marca', 'estado', 'tipo', 'capacidad_carga', 'id_gestor', 'id_grua'];

    public function gestores()
    {
        return $this->belongsToMany(Gestor::class);
    }

    public function operadores(){
        return $this->belongsToMany(Operador::class, 'utiliza', 'id_grua', 'id_operador')
                    ->withPivot('hora_inicio', 'hora_fin')
                    ->withTimestamps(); 
    }
    

}
