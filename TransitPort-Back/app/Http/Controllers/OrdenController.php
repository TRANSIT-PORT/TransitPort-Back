<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Turno;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function crearOpciones() {
        $zonas = Zona::all();
        $amarres = DB::table('buque')
        -> distinct()
        -> pluck('amarre');
        $turnos = Turno::all();

        return view('Administrativo.crearOrden', ['zonas' => $zonas, 'amarres' => $amarres, 'turnos' => $turnos]);
    }

    public function guardarOrden(Request $request) {
        $orden = request() -> validate([
            'tipo' => 'required',
            'fecha_inicio' => 'required',
            'id_zona' => 'required | exists: zona, id',
            'amarre' => 'required | exists: buque, amarres'
        ]);

        return view('Operador.welcome');
    }

    public function verAuditoria(Request $request) {
        $orden = DB::table('orden')
        -> join('grua', 'orden.id_grua', '=', 'grua.id')
        -> join('buque', 'orden.id_buque', '=', 'buque.id')
        -> join('turno', 'orden.id', '=', 'turno.id_orden')
        -> join('operador', 'turno.id_operador', '=', 'operador.id')
        -> select('orden.id', 'grua.nombre as id_grua', 'orden.tipo', 'buque.nombre as id_buque')

        //Subconsulta Operador.
        -> selectSub(function ($query) {
            $query -> from('turno')
                -> select('operador.nombre')
                -> whereColumn('turno.id_orden', 'orden.id')
                -> limit(1);
        }, 'tipo')
        -> where('orden.id',1)
        -> get();

        return $orden;
    }

    public function verOrden() {
        $task = DB::table('orden')
        -> select('*')
        //Subconsulta Operador.
        -> selectSub(function ($query) {
            $query -> from('turno')
                -> select('turno.fecha_inicio')
                -> whereColumn('turno.id_orden', 'orden.id')
                -> limit(1);
        }, 'turno')
        -> where('id', 1)
        -> get();

        return $task;
    }
}