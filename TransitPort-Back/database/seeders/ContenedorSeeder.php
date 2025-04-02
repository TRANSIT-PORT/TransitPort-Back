<?php

namespace Database\Seeders;

use App\Models\Contenedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContenedorSeeder extends Seeder {
    public function run(): void
    {
        $contenedores = [
            [
                'estado' => 'Por empezar',
                'id_zona' => '1',
                'altura' => '0',
                'parcela' => '4',
                'dimensiones' => '40',
                'tipo_contenedor' => 'Dry Van',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'Por empezar',
                'id_zona' => '3',
                'altura' => '0',
                'parcela' => '7',
                'dimensiones' => '40',
                'tipo_contenedor' => 'Reefer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'En curso',
                'id_zona' => '2',
                'altura' => '0',
                'parcela' => '12',
                'dimensiones' => '20',
                'tipo_contenedor' => 'Dry Van',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'En curso',
                'id_zona' => '2',
                'altura' => '0',
                'parcela' => '12',
                'dimensiones' => '20',
                'tipo_contenedor' => 'Open Top',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'Completada',
                'id_zona' => '1',
                'altura' => '0',
                'parcela' => '149',
                'dimensiones' => '40',
                'tipo_contenedor' => 'Flat Rack',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($contenedores as $contenedor) {
            Contenedor::create($contenedor);
        }
    }
}
