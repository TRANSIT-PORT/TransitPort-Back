<?php

namespace Database\Seeders;

use App\Models\Grua;
use App\Models\SC;
use App\Models\STS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruaSeeder extends Seeder {
    public function run(): void {
        $gruas = [
            [
                'nombre' => 'Atlas',
                'modelo' => 'SENNEBOGEN',
                'marca' => '9300E',
                'estado' => 'activo',
                'tipo' => 'SC',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Titan',
                'modelo' => 'Liebherr',
                'marca' => 'LHM600',
                'estado' => 'activo',
                'tipo' => 'STS',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($gruas as $grua) {
            Grua::create($grua);
            if ($grua['tipo'] === 'SC') {
                SC::create($grua);
            } else if ($grua['tipo'] === 'STS') {
                STS::create($grua);
            }
        }
    }
}