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
                'tipo' => 'SC',
                'fin_horario' => '10:00',
                'inicio_horario' => '18:00',
                'id_gestor' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'nombre' => 'Alberto Navarro',
                'usuario' => 'anavarro',
                'password' => '2000',
                'cargo' => 'operador',
                'tipo' => 'STS',
                'fin_horario' => '10:00',
                'inicio_horario' => '18:00',
                'id_gestor' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($operadores as $operadore) {
            Operador::create($operadore);
        }
    }
}