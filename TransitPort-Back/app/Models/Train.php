<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administrativo;

class Train extends Model
{
    protected $table = 'trains';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'parada', 'procedencia', 'destino', 'id_administrativo'];

    public function administrativos()
    {
        return $this->belongsToMany(Administrativo::class);
    }
}