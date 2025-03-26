<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trains = [
            [
                'nombre' => 'Tren A', 
                'parada' => '1',  
                'procedencia' => 'Italia',
                'destino' => 'Valencia',
                'id_administrativo' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tren B', 
                'parada' => '2',  
                'procedencia' => 'Barcelona',
                'destino' => 'Valencia',
                'id_administrativo' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tren C', 
                'parada' => '3',  
                'procedencia' => 'Grecia',
                'destino' => 'Barcelona',
                'id_administrativo' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tren D',  
                'parada' => '1',
                'procedencia' => 'Noruega',
                'destino' => 'Lisboa',
                'id_administrativo' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        

        foreach ($trains as $train) {
            Train::create($train);
        }
    }
}
