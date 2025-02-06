<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OrdenSeeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this -> call([
            GestorSeeder::class,
            AdministrativoSeeder::class,
            OperadorSeeder::class,
            GruaSeeder::class,
            PatioSeeder::class,
            ZonaSeeder::class,
            BuqueSeeder::class,
            ContenedorSeeder::class,
            TieneSeeder::class,
            OrdenSeeder::class,
            IncidenciaSeeder::class,
        ]);
    }    
}
