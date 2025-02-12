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
                'email' => 'gpalomares@gmail.com',
                'password' => '1111',
                'cargo' => 'gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Bartolome Mendez Zuroaga',
                'usuario' => 'bmendez',
                'email' => 'bmendez@gmail.com',
                'password' => '2222',
                'cargo' => 'gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Maria Jesus Alvarez',
                'usuario' => 'mjalvarez',
                'email' => 'mjalvarez@gmail.com',
                'password' => '1234',
                'cargo' => 'administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lucas Potter',
                'usuario' => 'lpotter',
                'email' => 'lpotter@gmail.com',
                'password' => '1111',
                'cargo' => 'administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Juan Sanchez',
                'usuario' => 'jsanchez',
                'email' => 'jsanchez@gmail.com',
                'password' => '1000',
                'cargo' => 'operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Alberto Navarro',
                'usuario' => 'anavarro',
                'email' => 'anavarro@gmail.com',
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
