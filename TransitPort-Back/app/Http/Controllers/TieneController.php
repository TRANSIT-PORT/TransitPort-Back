<?php

namespace App\Http\Controllers;

use App\Models\Tiene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TieneController extends Controller {
    public function index(Request $request) {
        // $task = DB::table('tiene')
        // -> join('zona', 'contenedor.id_zona', '=','zona.id')
        // -> join('contenedor', 'tiene.id_contenedor', '=','contenedor.id')
        // -> join('buque', 'tiene.id_buque', '=', 'buque.id')
        // -> select('id_contenedor', 'zona.ubicacion', 'id_buque', 'contenedor.estado')
        // -> get();
        $task = DB::table('tiene')
        -> join('contenedor', 'tiene.id_contenedor', '=', 'contenedor.id')
        -> select('id_contenedor', 'ubicacion', 'destino', 'contenedor.estado')
        -> get();
        return $task;
    }

    public function store(Request $request) {
       $validatedData = $request->validate([
            'id_buque' => 'int',
            'id_contenedor' => 'int',
            'ubicacion' => 'string',
            'destino' => 'string',
        ]);

        try {
            // Crear y guardar la tarea con asignación masiva
            $task = Tiene::create($validatedData);

            return response()->json([
                'message' => 'Relacion tiene creada con éxito.',
                'task' => $task,
            ], 201); // Código HTTP 201: Creado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al crear la relacion tiene.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function show(Request $request)
    {
        $task = Tiene::findOrFail($request->id);
        return $task;
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id_zona' => 'int',
        ]);

        try {
            $task = Tiene::findOrFail($request["id"]);
            $task->update($validatedData);

            return response()->json([
                'message' => 'Relacion tiene actualizada con éxito.',
                'task' => $task,
            ], 200);
            //Esta función actualizará la tarea que hayamos seleccionado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al actualizar la relacion tiene.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function destroy(Request $request)
    {
        $task = Tiene::destroy($request->id);  //task tienen el id que se ha borrado

        return response()->json([
            "message" => "Relacion tiene con id =" . $task . " ha sido borrado con éxito"
        ], 201);
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }
}