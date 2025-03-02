<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grua;
use App\Models\SC;
use App\Models\STS;
use Illuminate\Support\Facades\Auth;
use App\Models\Pertenece;

class GruaController extends Controller
{

    public function guardarGrua(Request $request) {
        $validatedData = $request->validate([
             'nombre' => 'string',
             'modelo' => 'string',
             'marca' => 'string',
             'estado' => 'string',
             'tipo' => 'required|in:SC,STS',
             'capacidad_carga' => 'numeric',
         ]);

         try {

            $usuario = Auth::user();
             // Crear y guardar la tarea con asignación masiva
             $task = Grua::create([
                "id" => null,
                "nombre" => $validatedData['nombre'],
                "modelo" => $validatedData['modelo'],
                "marca" => $validatedData['marca'],
                "estado" => 'activo',
                "tipo" => $validatedData['tipo'],
                "capacidad_carga" => $validatedData['capacidad_carga'],
                "id_gestor" => $usuario->id,
            ]);

            if($validatedData['tipo'] == 'SC'){

                $task = SC::create([
                    "id" => null,
                    "nombre" => $validatedData['nombre'],
                    "modelo" => $validatedData['modelo'],
                    "marca" => $validatedData['marca'],
                    "estado" => 'activo',
                    "tipo" => $validatedData['tipo'],
                    "capacidad_carga" => $validatedData['capacidad_carga'],
                    "id_gestor" => $usuario->id,
                ]);

            } else {

                $task = STS::create([
                    "id" => null,
                    "nombre" => $validatedData['nombre'],
                    "modelo" => $validatedData['modelo'],
                    "marca" => $validatedData['marca'],
                    "estado" => 'activo',
                    "tipo" => $validatedData['tipo'],
                    "capacidad_carga" => $validatedData['capacidad_carga'],
                    "id_gestor" => $usuario->id,
                ]);

            }

            $mensaje = "Grua creada con éxito!";

         } catch (\Exception $e) {

             return response()->json([
                 'message' => 'Error al crear la grua.',
                 'error' => $e->getMessage(),
             ], 500);
         }
         return view('Administrativo.exito', ['mensaje' => $mensaje]);

     }

}
