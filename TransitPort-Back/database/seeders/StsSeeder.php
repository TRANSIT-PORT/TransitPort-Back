<?php

namespace Database\Seeders;

use App\Models\STS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StsSeeder extends Seeder {
    public function run(): void {
        $zonas = [
            [
                'id_grua' => '2',
                'capacidad_carga' => '5000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($zonas as $zona) {
            STS::create($zona);
        }
    }
}