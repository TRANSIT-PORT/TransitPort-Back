<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestor;

class Operador extends Model
{
    protected $table = 'operador';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'usuario', 'password', 'tipo', 'fin_horario', 'inicio_horario', 'id_gestor'];

    public function gestores()
    {
        return $this->belongsToMany(Gestor::class);
    }
}
