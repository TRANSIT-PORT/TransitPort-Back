<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder {
    public function run(): void {
        $users = [
            [
                'name' => 'German Palomares',
                'email' => 'gpalomares@example.com',
                'password' => bcrypt('1111'),
                'estado' => 'Activo/a',
                'cargo' => 'Gestor',
                'usuario' => 'gpalomares',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Julia Ávila',
                'email' => 'javila@example.com',
                'password' => bcrypt(value: 'facilitadora'),
                'estado' => 'Activo/a',
                'cargo' => 'Administrativo',
                'usuario' => 'javila',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alfred Rum',
                'email' => 'arum@example.com',
                'password' => bcrypt('cobre'),
                'estado' => 'Activo/a',
                'cargo' => 'Operador',
                'usuario' => 'arum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bartolome Mendez Zuroaga',
                'email' => 'bmendez@example.com',
                'password' => bcrypt('2222'),
                'estado' => 'Inactivo/a',
                'usuario' => 'bmendez',
                'cargo' => 'Gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maria Jesus Alvarez',
                'email' => 'mjalvarez@example.com',
                'password' => bcrypt('1234'),
                'estado' => 'Activo/a',
                'usuario' => 'mjalvarez',
                'cargo' => 'Administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucas Potter',
                'email' => 'lpotter@example.com',
                'password' => bcrypt('1111'),
                'estado' => 'Inactivo/a',
                'usuario' => 'lpotter',
                'cargo' => 'Administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan Sanchez',
                'email' => 'jsanchez@example.com',
                'password' => bcrypt('1000'),
                'estado' => 'Inactivo/a',
                'usuario' => 'jsanchez',
                'cargo' => 'Operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alberto Navarro',
                'email' => 'anavarro@example.com',
                'password' => bcrypt('2000'),
                'estado' => 'Activo/a',
                'usuario' => 'anavarro',
                'cargo' => 'Operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eva María González',
                'email' => 'emgonzalez@example.com',
                'password' => bcrypt('3300'),
                'estado' => 'Activo/a',
                'usuario' => 'emgonzalez',
                'cargo' => 'Operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jordi Martínez',
                'email' => 'jmartinez@example.com',
                'password' => bcrypt('2200'),
                'estado' => 'Activo/a',
                'usuario' => 'jmartinez',
                'cargo' => 'Operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Marina Dor',
                'email' => 'mdor@example.com',
                'password' => bcrypt('2220'),
                'estado' => 'Activo/a',
                'usuario' => 'mdor',
                'cargo' => 'Operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
