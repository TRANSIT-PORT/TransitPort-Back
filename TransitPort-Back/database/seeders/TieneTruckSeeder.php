<?php

namespace Database\Seeders;

use App\Models\TieneTruck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TieneTruckSeeder extends Seeder {
    public function run(): void
    {
        $tiene = [
            [
                'id_truck' => '1',
                'id_contenedor' => '1',
                'ubicacion' => '1',
                'destino' => '1',
                'tipo_destino' => 'Zona',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tiene as $relacion) {
            TieneTruck::create($relacion);
        }
    }
}
