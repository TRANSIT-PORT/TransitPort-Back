<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trucks = [
            [
                'nombre' => 'Camion 1',
                'matricula' => 'ABC1234',  // Matricula para el primer camión
                'aparcamiento' => 1,  // Aparcamiento 1
                'procedencia' => 'Madrid',
                'destino' => 'Valencia',
                'id_administrativo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camion 2',
                'matricula' => 'XYZ5678',  // Matricula para el segundo camión
                'aparcamiento' => 2,  // Aparcamiento 2
                'procedencia' => 'Barcelona',
                'destino' => 'Valencia',
                'id_administrativo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camion 3',
                'matricula' => 'LMN9876',  // Matricula para el tercer camión
                'aparcamiento' => 3,  // Aparcamiento 3
                'procedencia' => 'Bilbao',
                'destino' => 'Madrid',
                'id_administrativo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Camion 4',
                'matricula' => 'DEF2345',  // Matricula para el cuarto camión
                'aparcamiento' => 1,  // Aparcamiento 1
                'procedencia' => 'Sevilla',
                'destino' => 'Lisboa',
                'id_administrativo' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        

        foreach ($trucks as $truck) {
            Truck::create($truck);
        }
    }
}
