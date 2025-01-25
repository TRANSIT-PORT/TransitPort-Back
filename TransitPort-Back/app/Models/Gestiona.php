<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grua;
use App\Models\Contenedor;

class Gestiona extends Model
{
    protected $table = 'gestiona';
    protected $primaryKey = ['id_grua', 'id_contenedor'];
    protected $fillable = ['fecha', 'hora'];

    public function gruas()
    {
        return $this->belongsToMany(Grua::class);
    }
    public function contenedores()
    {
        return $this->belongsToMany(Contenedor::class);
    }
}
