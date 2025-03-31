<?php

namespace App\Http\Controllers;

use App\Models\Contenedor;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContenedorController extends Controller {
    public function index(Request $request) {
        $task = Contenedor::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD.
    }

    public function store(Request $request) {
       $validatedData = $request->validate([
            'id_zona' => 'int',
        ]);

        try {
            // Crear y guardar la tarea con asignación masiva
            $task = Contenedor::create($validatedData);

            return response()->json([
                'message' => 'Contenedor creada con éxito.',
                'task' => $task,
            ], 201); // Código HTTP 201: Creado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al crear el contenedor.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function show(Request $request)
    {
        $task = Contenedor::findOrFail($request->id);
        return $task;
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id_zona' => 'int',
        ]);

        try {
            $task = Contenedor::findOrFail($request["id"]);
            $task->update($validatedData);

            return response()->json([
                'message' => 'Contenedor actualizada con éxito.',
                'task' => $task,
            ], 200);
            //Esta función actualizará la tarea que hayamos seleccionado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al actualizar el contenedor.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function destroy(Request $request)
    {
        $task = Contenedor::destroy($request->id);  //task tienen el id que se ha borrado

        return response()->json([
            "message" => "Contenedor con id =" . $task . " ha sido borrado con éxito"
        ], 201);
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

    public function comprobarParcela(Request $request)
        {
            $parcela = $request->query('parcela');
            $id_zona = $request->query('id_zona');

            $zona = Zona::find($id_zona);

            if ($zona) {

                $max = $zona->X * $zona->Y;

            $ocupada_altura_cero = Contenedor::where('parcela', $parcela)
                                ->where('id_zona', $id_zona)
                                ->where('altura', '0')
                                ->exists();

            $ocupada_altura_uno = Contenedor::where('parcela', $parcela)
                                ->where('id_zona', $id_zona)
                                ->where('altura', '1')
                                ->exists();

            $ocupada_altura_dos = Contenedor::where('parcela', $parcela)
                                ->where('id_zona', $id_zona)
                                ->where('altura', '2')
                                ->exists();

            $ocupada = ($ocupada_altura_cero && $ocupada_altura_uno && $ocupada_altura_dos);

            return response()->json(['ocupada' => $ocupada, 'max' => $max, 'altura_cero' => $ocupada_altura_cero, 'altura_uno' => $ocupada_altura_uno, 'altura_dos' => $ocupada_altura_dos]);
            }
        }
}