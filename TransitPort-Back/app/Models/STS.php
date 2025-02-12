<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Grua;

class STS extends Model {
    protected $table = 'STS';
    protected $primaryKey = 'id_grua';
    protected $fillable = ['capacidad_carga'];

    public function gruas() {
        return $this->belongsToMany(Grua::class);
    }
}
