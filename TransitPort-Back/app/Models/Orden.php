<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Administrativo;
use App\Models\Operador;
use App\Models\Buque;
use App\Models\Train;
use App\Models\Truck;
use App\Models\TieneBuque;
use App\Models\TieneTrain;
use App\Models\TieneTruck;
use App\Models\Zona;
use App\Models\User;

class Orden extends Model
{
    protected $table = 'orden';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo', 'cantidad_contenedores', 'fecha_inicio', 'estado', 'fecha_fin', 'visto', 'id_administrativo', 'visto', 'id_operador', 'id_buque', 'id_train', 'id_truck', 'id_zona', 'tipo_transporte'];

    public function administrativos()
    {
        return $this->belongsToMany(Administrativo::class);
    }
    public function operador()
    {
        return $this->belongsToMany(Operador::class);
    }
    public function buques()
    {
        return $this->belongsToMany(Buque::class);
    }
    public function zonas()
    {
        return $this->belongsToMany(zona::class);
    }
    public function buque()
    {
        return $this->belongsTo(Buque::class, 'id_buque', 'id');
    }

    public function train()
    {
        return $this->belongsTo(Train::class, 'id_train', 'id');
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'id_truck', 'id');
    }
    public function tiene_buque()
    {
        return $this->belongsTo(TieneBuque::class, 'id_buque', 'id_buque');
    }
    public function tiene_train()
    {
        return $this->belongsTo(TieneTrain::class, 'id_train', 'id_train');
    }
    public function tiene_truck()
    {
        return $this->belongsTo(TieneTruck::class, 'id_truck', 'id_truck');
    }
    public function contenedor()
    {
        return $this->belongsTo(Contenedor::class, 'id_contenedor', 'id');
    }
    public function zona()
    {
        return $this->belongsTo(Zona::class, foreignKey: 'id_zona');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_administrativo');
    }
}
