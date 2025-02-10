<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorController extends Controller {
    public function index(Request $request) {
        $task = Gestor::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'string',
            'password' => 'string',
        ]);

        try {
            // Crear y guardar la tarea con asignación masiva
            $task = Gestor::create($validatedData);

            return response()->json([
                'message' => 'Gestor creado con éxito.',
                'task' => $task,
            ], 201); // Código HTTP 201: Creado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al crear el Gestor.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function show(Request $request)
    {
        $task = Gestor::findOrFail($request->id);
        return $task;
    }

    public function update(Request $request)
    {
       $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'string',
            'password' => 'string',
        ]);

        try {
            $task = Gestor::findOrFail($request["id"]);
            $task->update($validatedData);

            return response()->json([
                'message' => 'Gestor actualizado con éxito.',
                'task' => $task,
            ], 200);
            //Esta función actualizará la tarea que hayamos seleccionado

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al actualizar el Gestor.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function destroy(Request $request)
    {
        $task = Gestor::destroy($request->id);  //task tienen el id que se ha borrado

        return response()->json([
            "message" => "Gestor con id =" . $task . " ha sido borrado con éxito"
        ], 201);
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

    public function crearUsuario(){

        return view('Gestor/crearUsuario');

    }

    public function crearGrua(){

        return view('Gestor/crearGrua');

    }

}
