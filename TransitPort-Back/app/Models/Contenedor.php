<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Zona;

class Contenedor extends Model
{
    protected $table = 'contenedor';
    protected $primaryKey = 'id';
    protected $fillable = ['estado', 'id_zona'];

    public function zonas()
    {
        return $this->belongsToMany(Zona::class);
    }

    public function buques(){
        return $this->belongsToMany(Buque::class, 'tiene_buque', 'id_contenedor', 'id_buque')
                    ->withPivot('ubicacion', 'destino', 'tipo_destino')
                    ->withTimestamps(); 
    }

    public function trains(){
        return $this->belongsToMany(Train::class, 'tiene_train', 'id_contenedor', 'id_train')
                    ->withPivot('ubicacion', 'destino', 'tipo_destino')
                    ->withTimestamps(); 
    }

    public function trucks(){
        return $this->belongsToMany(Truck::class, 'tiene_truck', 'id_contenedor', 'id_truck')
                    ->withPivot('ubicacion', 'destino', 'tipo_destino')
                    ->withTimestamps(); 
    }
}
