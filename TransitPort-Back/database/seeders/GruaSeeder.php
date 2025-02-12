<?php

namespace Database\Seeders;

use App\Models\Grua;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruaSeeder extends Seeder {
    public function run(): void {
        $gruas = [
            [
                'capacidad_carga' => '5000',
                'estado' => 'activo',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'capacidad_carga' => '5000',
                'estado' => 'activo',
                'id_gestor' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($gruas as $grua) {
            Grua::create($grua);
        }
    }
}