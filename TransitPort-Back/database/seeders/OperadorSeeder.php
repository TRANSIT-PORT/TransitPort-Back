<?php

namespace Database\Seeders;

use App\Models\Operador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperadorSeeder extends Seeder {
    public function run(): void {
        $operadores = [
            [
                'id' => '5',
                'nombre' => 'Juan Sanchez',
                'usuario' => 'jsanchez',
                'password' => '1000',
                'cargo' => 'operador',
                'estado' => 'Inactivo/a',
                'tipo' => 'SC',
                'id_gestor' => '1',
                'id_turno' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'nombre' => 'Alberto Navarro',
                'usuario' => 'anavarro',
                'password' => '2000',
                'cargo' => 'operador',
                'estado' => 'Inactivo/a',
                'tipo' => 'STS',
                'id_gestor' => '2',
                'id_turno' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '7',
                'nombre' => 'Jordi Martínez',
                'usuario' => 'jmartinez',
                'password' => '2200',
                'cargo' => 'operador',
                'estado' => 'Activo/a',
                'tipo' => 'SC',
                'id_gestor' => '1',
                'id_turno' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '8',
                'nombre' => 'Eva María González',
                'usuario' => 'emgonzalez',
                'password' => '3300',
                'cargo' => 'operador',
                'estado' => 'Activo/a',
                'tipo' => 'STS',
                'id_gestor' => '1',
                'id_turno' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '9',
                'nombre' => 'Marina Dor',
                'usuario' => 'mdor',
                'password' => '2220',
                'cargo' => 'operador',
                'estado' => 'Activo/a',
                'tipo' => 'SC',
                'id_gestor' => '2',
                'id_turno' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        foreach ($operadores as $operadore) {
            Operador::create($operadore);
        }
    }
}
