<?php

namespace Database\Seeders;

use App\Models\TieneBuque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TieneBuqueSeeder extends Seeder {
    public function run(): void
    {
        $tiene_buque = [
            [
                'id_buque' => '2',
                'id_contenedor' => '1',
                'ubicacion' => '1',
                'destino' => '1',
                'tipo_destino' => 'Zona',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_buque' => '1',
                'id_contenedor' => '3',
                'ubicacion' => '1',
                'destino' => '2',
                'tipo_destino' => 'Buque',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_buque' => '1',
                'id_contenedor' => '5',
                'ubicacion' => '1',
                'destino' => '2',
                'tipo_destino' => 'Buque',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tiene_buque as $relacion) {
            TieneBuque::create($relacion);
        }
    }
}
