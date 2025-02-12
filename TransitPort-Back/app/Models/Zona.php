<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gestor;
use App\Models\Patio;
use App\Models\Grua;

class Zona extends Model {
    protected $table = 'zona';
    protected $primaryKey = 'id';
    protected $fillable = ['ubicacion', 'capacidad', 'id_gestor', 'id_patio', 'id_grua'];

    public function gestores()
    {
        return $this->belongsToMany(Gestor::class);
    }
    public function patios()
    {
        return $this->belongsToMany(Patio::class);
    }
    public function gruas()
    {
        return $this->belongsToMany(Grua::class);
    }
}
