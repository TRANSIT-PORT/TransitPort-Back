<?php

namespace Database\Seeders;

use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonaSeeder extends Seeder {
    public function run(): void {
        $zonas = [
            [
                'ubicacion' => 'MSC',
                'capacidad' => '3500',
                'id_gestor' => '1',
                'id_patio' => '1',
                'id_grua' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ubicacion' => 'Terminal Norte',
                'capacidad' => '5000',
                'id_gestor' => '2',
                'id_patio' => '1',
                'id_grua' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ubicacion' => 'Muelle Este',
                'capacidad' => '4200',
                'id_gestor' => '1',
                'id_patio' => '1',
                'id_grua' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ubicacion' => 'HAMBURG SÜD',
                'capacidad' => '7000',
                'id_gestor' => '1',
                'id_patio' => '1',
                'id_grua' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($zonas as $zona) {
            Zona::create($zona);
        }
    }
}
