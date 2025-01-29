<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestor;

class Patio extends Model
{
    protected $table = 'patio';
    protected $primaryKey = 'id';
    protected $fillable = ['x', 'y', 'z', 'capacidad', 'id_gestor'];

    public function gestores()
    {
        return $this->belongsToMany(Gestor::class);
    }
}
