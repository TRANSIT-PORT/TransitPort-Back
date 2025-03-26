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
                'fecha_inicio' => '2025-02-05',
                'fecha_fin' => '2025-02-11',
                'estado' => 'Por empezar',
                'visto' => '1',
                'id_administrativo' => '3',
                'id_operador' => '7',
                'tipo_transporte' => 'buque',
                'id_buque' => '2',
                'id_train' => null,
                'id_truck' => null,
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'descarga',
                'fecha_inicio' => '2025-02-04',
                'fecha_fin' => '2025-02-07',
                'estado' => 'En curso',
                'visto' => '0',
                'id_administrativo' => '4',
                'id_operador' => '7',
                'tipo_transporte' => 'truck',
                'id_buque' => null,
                'id_train' => null,
                'id_truck' => '1',
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'carga',
                'fecha_inicio' => '2025-02-04',
                'fecha_fin' => '2025-02-07',
                'estado' => 'En curso',
                'visto' => '0',
                'id_administrativo' => '4',
                'id_operador' => '7',
                'tipo_transporte' => 'train',
                'id_buque' => null,
                'id_train' => '1',
                'id_truck' => null,
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'descarga',
                'fecha_inicio' => '2025-02-04',
                'fecha_fin' => '2025-02-07',
                'estado' => 'En curso',
                'visto' => '1',
                'id_administrativo' => '4',
                'id_operador' => '8',
                'tipo_transporte' => 'buque',
                'id_buque' => '1',
                'id_train' => null,
                'id_truck' => null,
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo' => 'descarga',
                'fecha_inicio' => '2025-02-04',
                'fecha_fin' => '2025-02-07',
                'estado' => 'En curso',
                'visto' => '0',
                'id_administrativo' => '4',
                'id_operador' => '8',
                'tipo_transporte' => 'buque',
                'id_buque' => '1',
                'id_train' => null,
                'id_truck' => null,
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
