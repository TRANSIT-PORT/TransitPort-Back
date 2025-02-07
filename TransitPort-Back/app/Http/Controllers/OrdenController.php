<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller {
    public function index(Request $request) {
        $task = Orden::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request) {
       $validatedData = $request->validate([
            'tipo' => 'string',
            'cantidad_contenedores' => 'int',
            'fecha_carga' => 'date',
            'fecha_descarga' => 'date',
            'id_grua' => 'int',
            'id_administrativo' => 'int',
            'id_buque' => 'int',
            'id_contenedor' => 'int',
            'id_zona' => 'int',
        ]);

        try {
            // Crear y guardar la tarea con asignación masiva
            $task = Orden::create($validatedData);

            return response()->json([
                'message' => 'Orden creada con éxito.',
                'task' => $task,
            ], 201); // Código HTTP 201: Creado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al crear la Orden.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function show(Request $request)
    {
        $task = Orden::findOrFail($request->id);
        return $task;
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'tipo' => 'string',
            'cantidad_contenedores' => 'int',
            'fecha_carga' => 'date',
            'fecha_descarga' => 'date',
            'id_grua' => 'int',
            'id_administrativo' => 'int',
            'id_buque' => 'int',
            'id_contenedor' => 'int',
            'id_zona' => 'int',
        ]);

        try {
            $task = Orden::findOrFail($request["id"]);
            $task->update($validatedData);

            return response()->json([
                'message' => 'Orden actualizada con éxito.',
                'task' => $task,
            ], 200);
            //Esta función actualizará la tarea que hayamos seleccionado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al actualizar la Orden.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function destroy(Request $request)
    {
        $task = Orden::destroy($request->id);  //task tienen el id que se ha borrado

        return response()->json([
            "message" => "Orden con id =" . $task . " ha sido borrado con éxito"
        ], 201);
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }
}