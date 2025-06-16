<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buque;
use App\Models\Train;
use App\Models\Truck;

class TransporteController extends Controller
{

    public function crearTransporte(){

        return view('Gestor.crearTransporte');

    }

    public function buscarTransportes($tipo){

        switch($tipo){
            case 'buque':
                $transportes = Buque::all();
                break;
            case 'tren':
                $transportes = Train::all();
                break;
            case 'camion':
                $transportes = Truck::all();
                break;
        }

        return response()->json($transportes);

    }

    public function guardarTransporte(Request $request){

        $tipo = $request->input('tipo');
        $ubicacion = $request->input('ubicacion');
        $nombre = $request->input('name');
        $procedencia = $request->input('procedencia');
        $destino = $request->input('destino');
        $matricula = $request->input('matricula');
        $user = Auth::user();

        $buscarUbicacion = '';

        switch($tipo){
            case 'buque':
                $buscarUbicacion = Buque::where('amarre', $ubicacion)->get();
                break;
            case 'tren':
                $buscarUbicacion = Train::where('parada', $ubicacion)->get();
                break;
            case 'camion':
                $buscarUbicacion = Truck::where('aparcamiento', $ubicacion)->get();
                break;
        }

        if($nombre == '' || $tipo == '' || $ubicacion == '' || $procedencia == '' || $destino == '' || ($tipo == 'camion' && $matricula == '')){

            return response()->json([
                'success' => false,
                'message' => 'Completa todos los campos'
            ], 400);

        } else if(!$buscarUbicacion->isEmpty()){

            return response()->json([
                'success' => false,
                'message' => 'Ya existe un transporte en esa ubicación'
            ], 400);

        } else {

            switch($tipo){
                case 'buque':
                    Buque::Create([

                        'nombre' => $nombre,
                        'amarre' => $ubicacion,
                        'procedencia' => $procedencia,
                        'destino' => $destino,
                        'id_administrativo' => $user->id,
                    ]);

                    break;

                case 'tren':
                    Train::Create([

                        'nombre' => $nombre,
                        'parada' => $ubicacion,
                        'procedencia' => $procedencia,
                        'destino' => $destino,
                        'id_administrativo' => $user->id,
                    ]);

                    break;
                case 'camion':
                    Truck::Create([

                        'nombre' => $nombre,
                        'aparcamiento' => $ubicacion,
                        'matricula' => $matricula,
                        'procedencia' => $procedencia,
                        'destino' => $destino,
                        'id_administrativo' => $user->id,
                    ]);

                    break;
            }

            return response()->json([
                'success' => true,
                'message' => 'Transporte guardado correctamente'
            ]);

        }

    }

    public function borrarTransporte(Request $request){

        $id = $request ->input('id');
        $tipo = $request ->input('tipoTransporte');
        $transporte = null;

        switch($tipo){

            case 'buque':

                $transporte = Buque::findOrFail($id);
                break;

            case 'tren':

                $transporte = Train::findOrFail($id);
                break;

            case 'camion':

                $transporte = Truck::findOrFail($id);
                break;

        }

        if($transporte != null){
            $transporte->delete();
        }

        return view('Gestor.crearTransporte');

    }
}
