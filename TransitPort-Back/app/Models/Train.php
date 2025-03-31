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

    public function contenedores(){
        return $this->belongsToMany(Contenedor::class, 'tiene_train', 'id_contenedor', 'id_train')
                    ->withPivot('ubicacion', 'destino', 'tipo_destino')
                    ->withTimestamps(); 
    }
}