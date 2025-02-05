<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Buque;
use App\Models\Contenedor;

class Tiene extends Model
{
    protected $table = 'tiene';
    protected $primaryKey = 'id';
    protected $fillable = ['id_buque', 'id_contenedor', 'ubicacion', 'destino', 'tipo_dstino'];

    public function buques()
    {
        return $this->belongsToMany(Buque::class);
    }
    public function contenedores()
    {
        return $this->belongsToMany(Contenedor::class);
    }
}
