<?php

namespace Database\Seeders;

use App\Models\Orden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder {
    public function run(): void {
        $ordenes = [
            [
                'tipo' => 'carga',
                'cantidad_contenedores' => '75',
                'fecha_inicio' => '2025-02-05',
                'fecha_fin' => '2025-02-11',
                'estado' => 'Por empezar',
                'id_grua' => '1',
                'id_administrativo' => '2',
                'id_operador' => '3',
                'id_buque' => '1',
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'descarga',
                'cantidad_contenedores' => '125',
                'fecha_inicio' => '2025-02-04',
                'fecha_fin' => '2025-02-07',
                'estado' => 'En curso',
                'id_grua' => '1',
                'id_administrativo' => '6',
                'id_operador' => '9',
                'id_buque' => '1',
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($ordenes as $orden) {
            Orden::create($orden);
        }
    }
}
