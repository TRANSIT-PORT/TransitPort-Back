<?php

namespace Database\Seeders;

use App\Models\TieneTrain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TieneTrainSeeder extends Seeder {
    public function run(): void
    {
        $tiene = [
            [
                'id_train' => '1',
                'id_contenedor' => '1',
                'ubicacion' => '1',
                'destino' => '1',
                'tipo_destino' => 'Zona',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tiene as $relacion) {
            TieneTrain::create($relacion);
        }
    }
}
