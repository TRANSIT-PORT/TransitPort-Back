<?php

namespace Database\Seeders;

use App\Models\SC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScSeeder extends Seeder {
    public function run(): void {
        $zonas = [
            [
                'id_grua' => '1',
                'capacidad_carga' => '5000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($zonas as $zona) {
            SC::create($zona);
        }
    }
}