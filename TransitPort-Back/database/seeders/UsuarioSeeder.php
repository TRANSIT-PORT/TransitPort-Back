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
                'cargo' => 'gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bartolome Mendez Zuroaga',
                'email' => 'bmendez@example.com',
                'password' => bcrypt('2222'),
                'cargo' => 'gestor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maria Jesus Alvarez',
                'email' => 'mjalvarez@example.com',
                'password' => bcrypt('1234'),
                'cargo' => 'administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucas Potter',
                'email' => 'lpotter@example.com',
                'password' => bcrypt('1111'),
                'cargo' => 'administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan Sanchez',
                'email' => 'jsanchez@example.com',
                'password' => bcrypt('1000'),
                'cargo' => 'operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alberto Navarro',
                'email' => 'anavarro@example.com',
                'password' => bcrypt('2000'),
                'cargo' => 'operador',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
