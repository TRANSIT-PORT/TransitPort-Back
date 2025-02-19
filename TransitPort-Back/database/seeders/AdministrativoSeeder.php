<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrativoSeeder extends Seeder {
    public function run(): void {
        $administrativos = [
            [
                'id' => '3',
                'nombre' => 'Maria Jesus Alvarez',
                'usuario' => 'mjalvarez',
                'password' => '1234',
                'cargo' => 'Administrativo',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'nombre' => 'Carlos Fernández',
                'usuario' => 'cfernandez',
                'password' => 'abcd1234',
                'cargo' => 'Administrativo',
                'id_gestor' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'nombre' => 'Laura Sánchez',
                'usuario' => 'lsanchez',
                'password' => 'pass5678',
                'cargo' => 'Administrativo',
                'id_gestor' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
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
