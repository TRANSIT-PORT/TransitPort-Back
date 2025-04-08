<?php

namespace App\Http\Controllers;

use App\Models\Buque;
use App\Models\Operador;
use App\Models\Orden;
use App\Models\TieneBuque;
use App\Models\TieneTrain;
use App\Models\TieneTruck;
use App\Models\Turno;
use App\Models\Train;
use App\Models\Truck;
use App\Models\Gestiona;
use App\Models\Grua;
use App\Models\Contenedor;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Pail\ValueObjects\Origin\Console;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'visto'=> 'boolean',
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
            'id' => 'required',
            'tipo' => 'string',
            'estado' => 'nullable|string|in:Por empezar,En curso,Completada',
            'visto' => 'boolean',
            'fecha_carga' => 'date',
            'fecha_descarga' => 'date',
            'id_grua' => 'int',
            'id_administrativo' => 'int',
            'id_buque' => 'int',
            'id_contenedor' => 'int',
            'id_zona' => 'int',
        ]);

        try {
            $task = Orden::findOrFail($validatedData["id"]);

        // Usar fill() en lugar de update() para mayor control
        $task->fill($validatedData);

        if ($task->isDirty()) { // Verifica si hay cambios antes de guardar
            $task->save();
        }

            return response()->json([
                'message' => 'Orden actualizada con éxito en la base de datos.',
                'task' => $validatedData,
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Error al actualizar la Orden.',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function actualizarEstado(Request $request) {

        switch($request->tipo_transporte){

            case 'buque':

                $validatedData = $request->validate([
                    'id' => 'required',
                    'tipo' => 'string',
                    'estado' => 'nullable|string|in:Por empezar,En curso,Completada',
                    'visto' => 'boolean',
                    'fecha_carga' => 'date',
                    'fecha_descarga' => 'date',
                    'id_grua' => 'int',
                    'id_administrativo' => 'int',
                    'id_buque' => 'int',
                    'id_contenedor' => 'int',
                    'id_zona' => 'int',
                ]);

            break;

            case 'train':

                $validatedData = $request->validate([
                    'id' => 'required',
                    'tipo' => 'string',
                    'estado' => 'nullable|string|in:Por empezar,En curso,Completada',
                    'visto' => 'boolean',
                    'fecha_carga' => 'date',
                    'fecha_descarga' => 'date',
                    'id_grua' => 'int',
                    'id_administrativo' => 'int',
                    'id_train' => 'int',
                    'id_contenedor' => 'int',
                    'id_zona' => 'int',
                ]);

            break;

            case 'truck':

            $validatedData = $request->validate([
                'id' => 'required',
                'tipo' => 'string',
                'estado' => 'nullable|string|in:Por empezar,En curso,Completada',
                'visto' => 'boolean',
                'fecha_carga' => 'date',
                'fecha_descarga' => 'date',
                'id_grua' => 'int',
                'id_administrativo' => 'int',
                'id_truck' => 'int',
                'id_contenedor' => 'int',
                'id_zona' => 'int',
            ]);

            break;
        }

        try {
            $task = Orden::findOrFail($validatedData['id']);
        // Usar fill() en lugar de update() para mayor control
            $task->fill($validatedData);

            $task->save();

            return response()->json([
                'message' => 'Orden actualizada con éxito en la base de datos.',
                'task' => $validatedData,
            ], 200);

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
        $buques = Buque::all();
        $operadores = DB::table('users')
        -> select('*')
        -> where('cargo', 'operador')
        -> get();

        return view('Administrativo.crearOrden', ['zonas' => $zonas, 'buques' => $buques, 'operadores' => $operadores]);
    }

    public function getParcelasByZona(Request $request){

        $zonaId = $request->zona_id; 

        $zona = Zona::find($zonaId);
        
        if ($zona) {

            $max = $zona->X * $zona->Y;

            return response()->json([
                'x' => $zona->X, // Coordenada X
                'y' => $zona->Y,  // Coordenada Y
                'max' => $max,
            ]);
        } else {
            return response()->json([
                'message' => 'Zona no encontrada'
            ], 404);
        }
    }

    public function buscarParcela(Request $request) {
        $valorSeleccionado = $request->input('valor'); // Accede al valor enviado en la solicitud
    
        $zonaActual = Zona::where('id', $valorSeleccionado)->first(); // Usa el valor para buscar la zona
    
        // Verifica si se encuentra la zona
        if ($zonaActual) {
            return response()->json(['mensaje' => 'Valor recibido', 'zona' => $zonaActual]);
        } else {
            return response()->json(['mensaje' => 'Zona no encontrada'], 404);
        }

        return view('Administrativo.crearOrden', compact($zonaActual));
    }
    
    public function comprobarTipo(Request $request){

        $tipoOrden = $request->query('tipo');

        return response()->json(['tipo' => $tipoOrden]);

    }

    public function guardarOrden(Request $request) {
        $orden = $request -> validate([
            'tipo' => 'string',
            'operador' => 'int',
            'parcela' => 'int',
            'altura' => 'int',
            'id_zona' => 'int',
            'id_transporte' => 'int',
            'tipo_transporte' => 'string',
            'tipo_contenedor' => 'string|nullable',
            'dimensiones_contenedor' => 'int|nullable',
        ]);

        

        try {
            $operador = Operador::findOrFail($orden['operador']);
            $turno = Turno::findOrFail($operador['id_turno']);

            $tipo = ($orden['tipo']); 

            $administrativo = Auth::user();

            if($tipo == 'carga'){

                $contenedor = Contenedor::where('parcela', $orden['parcela'])
                                        ->where('altura', $orden['altura'])
                                        ->first();


                $idContenedor = $contenedor->id;

                if($orden['tipo_transporte'] == 'buque'){

                    $buque = Buque::findOrFail($orden['id_transporte']);

                    $tiene = TieneBuque::where('id_contenedor', $contenedor->id)
                                        ->where('ubicacion', $orden['id_zona'])
                                        ->get()->first();

                    if($tiene){

                        $contenedor->buques()->sync([
                            $buque->id => [
                                'ubicacion' => $orden['id_zona'],
                                'destino' => $orden['id_transporte'],
                                'tipo_destino' => $orden['tipo_transporte'],
                            ]
                        ], false);

                    } else {

                        $contenedor->buques()->syncWithoutDetaching([
                            $buque->id => [
                                'ubicacion' => $orden['id_zona'],
                                'destino' => $orden['id_transporte'],
                                'tipo_destino' => $orden['tipo_transporte'],
                            ]
                        ]);

                        TieneTrain::where('id_contenedor', $contenedor->id)->delete();
                        TieneTruck::where('id_contenedor', $contenedor->id)->delete();
                    }

                    Orden::create([
                        "id" => null,
                        "tipo" => $orden['tipo'],
                        "tipo_transporte" => $orden['tipo_transporte'],
                        "fecha_inicio" => $turno['fecha_inicio'],
                        "visto" => '0',
                        "fecha_fin" => $turno['fecha_fin'],
                        "estado" => "Por empezar",
                        "id_administrativo" => $administrativo['id'],
                        "id_operador" => $orden['operador'],
                        "id_buque" => $buque->id,
                        "id_train" => null,
                        "id_truck" => null,
                        "id_zona" => $orden['id_zona'],
                    ]);
                } else if($orden['tipo_transporte'] == 'train'){

                    $train = Train::findOrFail($orden['id_transporte']);
                    
                    $tiene = TieneTrain::where('id_contenedor', $contenedor->id)
                                        ->where('ubicacion', $orden['id_zona'])
                                        ->get()->first();

                    if($tiene){

                        $contenedor->trains()->sync([
                            $train->id => [
                                'ubicacion' => $orden['id_zona'],
                                'destino' => $orden['id_transporte'],
                                'tipo_destino' => $orden['tipo_transporte'],
                            ]
                        ], false);

                    } else {

                        $contenedor->trains()->syncWithoutDetaching([
                            $train->id => [
                                'ubicacion' => $orden['id_zona'],
                                'destino' => $orden['id_transporte'],
                                'tipo_destino' => $orden['tipo_transporte'],
                            ]
                        ]);

                        TieneBuque::where('id_contenedor', $contenedor->id)->delete();
                        TieneTruck::where('id_contenedor', $contenedor->id)->delete();
                    }

                    Orden::create([
                        "id" => null,
                        "tipo" => $orden['tipo'],
                        "tipo_transporte" => $orden['tipo_transporte'],
                        "fecha_inicio" => $turno['fecha_inicio'],
                        "visto" => '0',
                        "fecha_fin" => $turno['fecha_fin'],
                        "estado" => "Por empezar",
                        "id_administrativo" => $administrativo['id'],
                        "id_operador" => $orden['operador'],
                        "id_buque" => null,
                        "id_train" => $train->id,
                        "id_truck" => null,
                        "id_zona" => $orden['id_zona'],
                    ]);
                } else if($orden['tipo_transporte'] == 'truck'){

                    $truck = Truck::findOrFail($orden['id_transporte']);

                    $tiene = TieneTruck::where('id_contenedor', $contenedor->id)
                                        ->where('ubicacion', $orden['id_zona'])
                                        ->get()->first();

                    if($tiene){

                        $contenedor->trucks()->sync([
                            $truck->id => [
                                'ubicacion' => $orden['id_zona'],
                                'destino' => $orden['id_transporte'],
                                'tipo_destino' => $orden['tipo_transporte'],
                            ]
                        ], false);

                    } else {

                        $contenedor->trucks()->syncWithoutDetaching([
                            $truck->id => [
                                'ubicacion' => $orden['id_zona'],
                                'destino' => $orden['id_transporte'],
                                'tipo_destino' => $orden['tipo_transporte'],
                            ]
                        ]);

                        TieneTrain::where('id_contenedor', $contenedor->id)->delete();
                        TieneBuque::where('id_contenedor', $contenedor->id)->delete();
                    }

                    Orden::create([
                        "id" => null,
                        "tipo" => $orden['tipo'],
                        "tipo_transporte" => $orden['tipo_transporte'],
                        "fecha_inicio" => $turno['fecha_inicio'],
                        "visto" => '0',
                        "fecha_fin" => $turno['fecha_fin'],
                        "estado" => "Por empezar",
                        "id_administrativo" => $administrativo['id'],
                        "id_operador" => $orden['operador'],
                        "id_buque" => null,
                        "id_train" => null,
                        "id_truck" => $truck->id,
                        "id_zona" => $orden['id_zona'],
                    ]);
                }
                $mensaje = "¡Orden creada con éxito!";
            } else {

                if($orden['tipo_transporte'] == 'buque'){

                    $buque = Buque::findOrFail($orden['id_transporte']);

                    $contenedor = Contenedor::create([

                        "id" => null,
                        "tipo_contenedor" => $orden['tipo_contenedor'],
                        "dimensiones" => $orden['dimensiones_contenedor'],
                        "parcela" => $orden['parcela'],
                        "altura" => $orden['altura'],
                        "estado" => "Por empezar",
                        "id_zona" => $orden['id_zona'],

                    ]);

                    $ordenCrear = Orden::create([
                        "id" => null,
                        "tipo" => $orden['tipo'],
                        "tipo_transporte" => $orden['tipo_transporte'],
                        "fecha_inicio" => $turno['fecha_inicio'],
                        "visto" => '0',
                        "fecha_fin" => $turno['fecha_fin'],
                        "estado" => "Por empezar",
                        "id_administrativo" => $administrativo['id'],
                        "id_operador" => $orden['operador'],
                        "id_buque" => $buque->id,
                        "id_train" => null,
                        "id_truck" => null,
                        "id_zona" => $orden['id_zona'],
                    ]);

                    $contenedor->buques()->syncWithoutDetaching([
                        $buque->id => [
                            'ubicacion' => $orden['id_zona'],
                            'destino' => $orden['id_transporte'],
                            'tipo_destino' => $orden['tipo_transporte'],
                        ]
                    ]);

                } else if($orden['tipo_transporte'] == 'train'){

                    $train = Train::findOrFail($orden['id_transporte']);

                    $contenedor = Contenedor::create([

                        "id" => null,
                        "tipo_contenedor" => $orden['tipo_contenedor'],
                        "dimensiones" => $orden['dimensiones_contenedor'],
                        "parcela" => $orden['parcela'],
                        "altura" => $orden['altura'],
                        "estado" => "Por empezar",
                        "id_zona" => $orden['id_zona'],

                    ]);

                    $ordenCrear = Orden::create([
                        "id" => null,
                        "tipo" => $orden['tipo'],
                        "tipo_transporte" => $orden['tipo_transporte'],
                        "fecha_inicio" => $turno['fecha_inicio'],
                        "visto" => '0',
                        "fecha_fin" => $turno['fecha_fin'],
                        "estado" => "Por empezar",
                        "id_administrativo" => $administrativo['id'],
                        "id_operador" => $orden['operador'],
                        "id_train" => null,
                        "id_train" => $train->id,
                        "id_truck" => null,
                        "id_zona" => $orden['id_zona'],
                    ]);

                    $contenedor->trains()->syncWithoutDetaching([
                        $train->id => [
                            'ubicacion' => $orden['id_zona'],
                            'destino' => $orden['id_transporte'],
                            'tipo_destino' => $orden['tipo_transporte'],
                        ]
                    ]);

                } else{

                    $truck = Truck::findOrFail($orden['id_transporte']);

                    $contenedor = Contenedor::create([

                        "id" => null,
                        "tipo_contenedor" => $orden['tipo_contenedor'],
                        "dimensiones" => $orden['dimensiones_contenedor'],
                        "parcela" => $orden['parcela'],
                        "altura" => $orden['altura'],
                        "estado" => "Por empezar",
                        "id_zona" => $orden['id_zona'],

                    ]);

                    $ordenCrear = Orden::create([
                        "id" => null,
                        "tipo" => $orden['tipo'],
                        "tipo_transporte" => $orden['tipo_transporte'],
                        "fecha_inicio" => $turno['fecha_inicio'],
                        "visto" => '0',
                        "fecha_fin" => $turno['fecha_fin'],
                        "estado" => "Por empezar",
                        "id_administrativo" => $administrativo['id'],
                        "id_operador" => $orden['operador'],
                        "id_buque" => null,
                        "id_train" => null,
                        "id_truck" => $truck->id,
                        "id_zona" => $orden['id_zona'],
                    ]);

                    $contenedor->trucks()->syncWithoutDetaching([
                        $truck->id => [
                            'ubicacion' => $orden['id_zona'],
                            'destino' => $orden['id_transporte'],
                            'tipo_destino' => $orden['tipo_transporte'],
                        ]
                    ]);

                }

            }

            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la Orden.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return redirect() -> route('exito') -> with([
            'cabecera' => "Crear orden",
            'mensaje' => "¡Orden creada con éxito!"
        ]);
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

    public function getTransporte(Request $request){

        $tipo = $request->query('tipo');

        if($tipo === 'buque'){
            $task = Buque::all();
        }else if($tipo === 'train'){
            $task = Train::all();
        } else if($tipo === 'truck'){
            $task = Truck::all();
        }

        return response()->json($task);

    }

    /**
     * Funcion para mostrar las auditorias con Datatables.
     */
    public function visualizarAuditoria() {
        $orden = Orden::select(['id', 'tipo', 'estado'])
        -> where('estado', '!=', 'completada')
        -> get();

        return DataTables::of($orden)
            -> make(true);
    }

    public function mostrarUno($id) {

        $ordenSeleccionada = Orden::where('id', $id)->first();

        $tipo_transporte = $ordenSeleccionada->tipo_transporte;

        $datos = [

            'buque' => ['tabla' => 'buque', 'tiene' => 'tiene_buque', 'id' => 'id_buque'],
            'train' => ['tabla' => 'trains', 'tiene' => 'tiene_train', 'id' => 'id_train'],
            'truck' => ['tabla' => 'trucks', 'tiene' => 'tiene_truck', 'id' => 'id_truck'],

        ];
        $orden = DB::table('orden')
        ->join('operador', 'orden.id_operador', '=', 'operador.id')
        ->join($datos[$tipo_transporte]['tabla'], 'orden.' . $datos[$tipo_transporte]['id'], '=', $datos[$tipo_transporte]['tabla'] . '.id')
        ->join($datos[$tipo_transporte]['tiene'], $datos[$tipo_transporte]['tabla'] . '.id', '=', $datos[$tipo_transporte]['tiene'] . '.' . $datos[$tipo_transporte]['id'])
        ->join('turno', 'operador.id_turno', '=', 'turno.id')
        ->join('pertenece', 'orden.id_zona', '=', 'pertenece.id_zona')
        ->join('contenedor', $datos[$tipo_transporte]['tiene'] . '.id_contenedor', '=', 'contenedor.id')
        ->join('zona', 'contenedor.id_zona', '=', 'zona.id')
        ->select(
            'orden.id_operador', 
            'orden.' . $datos[$tipo_transporte]['id'], 
            'orden.id', 
            'orden.id_zona',
            'orden.tipo', 
            'orden.tipo_transporte', 
            'orden.estado', 
            'turno.fecha_inicio',
            DB::raw('CASE
                WHEN contenedor.estado = "Completada" THEN
                    CASE
                        WHEN ' . $datos[$tipo_transporte]['tiene'] . '.tipo_destino = "' . $tipo_transporte . '"
                        THEN ' . $datos[$tipo_transporte]['tabla'] . '.nombre
                        ELSE zona.ubicacion
                    END
                WHEN ' . $datos[$tipo_transporte]['tiene'] . '.tipo_destino = "' . $tipo_transporte . '"
                THEN zona.ubicacion
                ELSE ' . $datos[$tipo_transporte]['tabla'] . '.nombre
                END AS ubicacion'
            ),
            DB::raw('CASE
                WHEN ' . $datos[$tipo_transporte]['tiene'] . '.tipo_destino = "' . $tipo_transporte . '"
                THEN ' . $datos[$tipo_transporte]['tabla'] . '.nombre
                ELSE zona.ubicacion
                END AS destino'
            )
        )
        ->first();

        $relacion = null;

        switch($tipo_transporte){

            case 'buque':

                $relacion = TieneBuque::where('id_buque', $orden->id_buque)
                                        ->where('ubicacion', $orden->id_zona)
                                        ->first();
                
                $transporte = Buque::where('id', $orden->id_buque)->first();

                break;

            case 'train':

                $relacion = TieneTrain::where('id_train', $orden->id_train)
                                        ->where('ubicacion', $orden->id_zona)
                                        ->first();

                $transporte = Train::where('id', $orden->id_train)->first();

                break;

            case 'truck':

                $relacion = TieneTruck::where('id_truck', $orden->id_truck)
                                        ->where('ubicacion', $orden->id_zona)
                                        ->first();

                $transporte = Truck::where('id', $orden->id_truck)->first();

                break;


        }

        $contenedor = Contenedor::where('id', $relacion->id_contenedor)->first();
        $zona = Zona::where('id', $orden->id_zona)->first();
        $operador = Operador::where('id', $orden->id_operador)->first();
        $gestiona = Gestiona::where('id_contenedor', $contenedor->id)->first();
        $grua = Grua::where('id', $gestiona->id_grua)->first();


        if ($orden) {
            return view('Administrativo/Auditorias/realizarAuditorias', compact('orden', 'relacion', 'contenedor', 'operador', 'grua', 'transporte', 'gestiona', 'zona'));
        } else {
            return redirect() -> route('Administrativo/Auditorias/verAuditoria');
        }
    }

    public function sacarDimensiones(Request $request){

        $opciones = [];

        switch($request->input('tipo_contenedor')){

            case 'Dry Van':

                $opciones = ['40', '20'];

            break;

            case 'High Cube':

                $opciones = ['40'];

            break;

            case 'Reefer':

                $opciones = ['40', '20'];

            break;

            case 'Open Top':

                $opciones = ['40', '20'];

            break;

            case 'Flat Rack':

                $opciones = ['40', '20'];

            break;

        }

        return response()->json($opciones);

    }
}
