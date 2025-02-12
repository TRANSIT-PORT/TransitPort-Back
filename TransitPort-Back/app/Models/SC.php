<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grua;

class SC extends Model {
    protected $table = 'SC';
    protected $primaryKey = 'id_grua';
    protected $fillable = ['capacidad_carga'];

    public function gruas() {
        return $this->belongsToMany(Grua::class);
    }
}
