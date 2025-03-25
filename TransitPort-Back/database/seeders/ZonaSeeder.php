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
                'X' => '130',
                'Y' => '300',
                'Z' => '3',
                'capacidad' => '117000',
                'id_gestor' => '1',
                'id_patio' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zona 2',
                'ubicacion' => 'Terminal Norte',
                'X' => '90',
                'Y' => '300',
                'Z' => '3',
                'capacidad' => '81000',
                'id_gestor' => '2',
                'id_patio' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zona 4',
                'ubicacion' => 'Muelle Este',
                'X' => '90',
                'Y' => '300',
                'Z' => '3',
                'capacidad' => '81000',
                'id_gestor' => '1',
                'id_patio' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zona 3',
                'ubicacion' => 'HAMBURG SÜD',
                'X' => '90',
                'Y' => '300',
                'Z' => '3',
                'capacidad' => '81000',
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

