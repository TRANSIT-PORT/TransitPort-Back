<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder {
    public function run(): void {
        $users = [
            [
                'nombre' => 'German Palomares',
                'usuario' => 'gpalomares',
                'password' => '1111',
                'cargo' => 'gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bartolome Mendez Zuroaga',
                'usuario' => 'bmendez',
                'password' => '2222',
                'cargo' => 'gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Maria Jesus Alvarez',
                'usuario' => 'mjalvarez',
                'password' => '1234',
                'cargo' => 'administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lucas Potter',
                'usuario' => 'lpotter',
                'password' => '1111',
                'cargo' => 'administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Juan Sanchez',
                'usuario' => 'jsanchez',
                'password' => '1000',
                'cargo' => 'operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Alberto Navarro',
                'usuario' => 'anavarro',
                'password' => '2000',
                'cargo' => 'operador',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}