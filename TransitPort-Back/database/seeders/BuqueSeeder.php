<?php

namespace Database\Seeders;

use App\Models\Buque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuqueSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $buques = [
            [
                'nombre' => 'Santa Maria',
                'amarre' => '2',
                'procedencia' => 'Italia',
                'destino' => 'Valencia',
                'id_administrativo' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Titanic',
                'amarre' => '1',
                'procedencia' => 'Barcelona',
                'destino' => 'Valencia',
                'id_administrativo' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($buques as $buque) {
            Buque::create($buque);
        }        
    }
}
