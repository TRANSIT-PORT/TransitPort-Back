<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder {
    public function run(): void {
        $zonas = [
            [
                'nombre' => 'Zona 1',
                'ubicacion' => 'MSC',
                'capacidad' => '3500',
                'id_gestor' => '1',
                'id_patio' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zona 2',
                'ubicacion' => 'HAMBURG SÜD',
                'capacidad' => '7000',
                'id_gestor' => '1',
                'id_patio' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($zonas as $zona) {
            Zona::create($zona);
        }
    }
}
