<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gruas;
use App\Models\Zonas;

class Pertenece extends Model
{
    protected $table = 'pertenece';
    protected $primaryKey = ['id_grua', 'id_zona'];
    protected $fillable = ['fecha', 'hora'];

    public function gruas()
    {
        return $this->belongsToMany(Grua::class);
    }
    public function zonas()
    {
        return $this->belongsToMany(Zona::class);
    }
}
