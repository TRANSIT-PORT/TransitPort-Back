<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrativoSeeder extends Seeder {
    public function run(): void {
        $administrativos = [
            [
                'nombre' => 'Maria Jesus Alvarez',
                'usuario' => 'mjalvarez',
                'password' => '1234',
                'cargo' => 'Administrativo',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lucas Potter',
                'usuario' => 'lpotter',
                'password' => '1111',
                'cargo' => 'Administrativo',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($administrativos as $administrativo) {
            Administrativo::create($administrativo);
        }
    }
}