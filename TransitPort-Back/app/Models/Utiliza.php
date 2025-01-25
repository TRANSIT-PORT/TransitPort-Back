<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gruas;
use App\Models\Operador;

class Utiliza extends Model
{
    protected $table = 'utiliza';
    protected $primaryKey = ['id_grua', 'id_operador'];
    protected $fillable = ['hora_inicio', 'hora_fin'];

    public function gruas()
    {
        return $this->belongsToMany(Grua::class);
    }
    public function operadores()
    {
        return $this->belongsToMany(Operador::class);
    }
}
