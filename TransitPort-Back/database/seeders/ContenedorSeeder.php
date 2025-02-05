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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'En curso',
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'Completada',
                'id_zona' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($contenedores as $contenedor) {
            Contenedor::create($contenedor);
        }
    }
}