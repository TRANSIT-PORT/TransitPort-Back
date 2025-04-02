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

    public function comprobarParcela(Request $request){
            $parcela = $request->query('parcela');
            $tipo_orden = $request->query('tipo_orden');
            $tipo_contenedor = $request->query('tipo_contenedor');
            $dimensiones_contenedor = $request->query('dimensiones_contenedor');
            $altura = $request->query('altura');
            $id_zona = $request->query('id_zona');
            $ocupado = null;
            $ocupada = null;
            $opcionesAlturas = [];
            $ocupada_altura_cero = null;
            $ocupada_altura_uno = null;
            $ocupada_altura_dos = null;

            $zona = Zona::find($id_zona);

            if ($zona) {

                if($dimensiones_contenedor == '40'){

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


                    if($tipo_orden == 'descarga'){

                        if (!$ocupada_altura_cero) {
                            $opcionesAlturas[] = '0';
                        }
                        if (!$ocupada_altura_uno) {
                            $opcionesAlturas[] = '1';
                        }
                        if (!$ocupada_altura_dos) {
                            $opcionesAlturas[] = '2';
                        }
                    } else{

                        $opcionesAlturas = ['0', '1', '2'];

                    }

                    return response()->json([   
                        'ocupada' => $ocupada,
                        'altura_cero' => $ocupada_altura_cero, 
                        'altura_uno' => $ocupada_altura_uno, 
                        'altura_dos' => $ocupada_altura_dos, 
                        'opcionesAlturas' => $opcionesAlturas
                    ]);

                } else {

                    $contenedor_abajo_40 = false;
                    $contenedor_abajo_20 = false;
                    // Si el contenedor es de 20, hay que verificar cuántos hay en cada altura
                    $ocupacion_alturas = [
                        '0' => Contenedor::where('parcela', $parcela)
                                        ->where('id_zona', $id_zona)
                                        ->where('altura', '0')
                                        ->count(),
                        '1' => Contenedor::where('parcela', $parcela)
                                        ->where('id_zona', $id_zona)
                                        ->where('altura', '1')
                                        ->count(),
                        '2' => Contenedor::where('parcela', $parcela)
                                        ->where('id_zona', $id_zona)
                                        ->where('altura', '2')
                                        ->count()
                    ];

                    $altura_ocupada_por_40 = [
                        '0' => Contenedor::where('parcela', $parcela)
                                        ->where('id_zona', $id_zona)
                                        ->where('altura', '0')
                                        ->where('dimensiones', '40')
                                        ->exists(),
                        '1' => Contenedor::where('parcela', $parcela)
                                        ->where('id_zona', $id_zona)
                                        ->where('altura', '1')
                                        ->where('dimensiones', '40')
                                        ->exists(),
                        '2' => Contenedor::where('parcela', $parcela)
                                        ->where('id_zona', $id_zona)
                                        ->where('altura', '2')
                                        ->where('dimensiones', '40')
                                        ->exists()
                    ];
                    

                    if($altura != 0){

                        $contenedor_abajo_40 = Contenedor::where('parcela', $parcela)
                                                        ->where('id_zona', $id_zona)
                                                        ->where('altura', $altura - 1)
                                                        ->where('dimensiones', '40')
                                                        ->whereIn('tipo_contenedor', ['Open Top', 'Flat Rack'])
                                                        ->exists();

                        $contenedor_abajo_20 = Contenedor::where('parcela', $parcela)
                                                        ->where('id_zona', $id_zona)
                                                        ->where('altura', $altura - 1)
                                                        ->where('dimensiones', '20')
                                                        ->whereIn('tipo_contenedor', ['Open Top', 'Flat Rack'])
                                                        ->exists();
                        
                    }
            
                    $opcionesAlturas = [];
            
                    foreach ($ocupacion_alturas as $altura_key => $cantidad) {
                        if (!$altura_ocupada_por_40[$altura_key] && $cantidad < 2 && (!$contenedor_abajo_20 || !$contenedor_abajo_40)) {
                            $opcionesAlturas[] = $altura_key;
                        }
                    }
            
                    $ocupado = empty($opcionesAlturas);
            
                    return response()->json([
                        'ocupado' => $ocupado,
                        'ocupacion_alturas' => $ocupacion_alturas,
                        'opcionesAlturas' => $opcionesAlturas,
                        'tipo_abajo_20' => $contenedor_abajo_20,
                        'tipo_abajo_40' => $contenedor_abajo_40,
                    ]);
                }
                
            }
    }
}