<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Grua;
use App\Models\Patio;
use App\Models\Zona;
use App\Http\Controllers\Datatables;
use Illuminate\Support\Facades\Auth;

class GestorController extends Controller {
    public function index(Request $request) {
        $task = User::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
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
            'cargo' => 'string',
            'estado' => 'string',
            'email' => 'string',
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
        $task = Gestor::findOrFail($request->id);
        $task->delete();

        return response()->json([
            "message" => "Gestor con id =" . $request->id . " ha sido borrado con éxito"
        ], 201);
        //Esta función obtendra el id de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

    public function crearUsuario(){

        return view('Gestor.crearUsuario');

    }

    public function crearGrua(){

        $zonas = Zona::all();

        return view('Gestor.crearGrua', compact('zonas'));

    }

    public function crearPatio(){

        return view('Gestor.crearPatio');

    }

    public function guardarUsuario(Request $request){

        $user = $request -> validate([
            'name' => 'string',
            'usuario' => 'string',
            'email' => 'email',
            'telefono' => 'string',
            'ciudad' => 'string',
            'codigoPostal' => 'string',
            'password' => 'string',
            'cargo' => 'string|in:gestor,administrativo,operador',
        ]);

        try {
            $user['password'] = bcrypt($user['password']); // Encriptar contraseña
            User::create($user);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el usuario.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return view('Gestor.crearUsuario');

    }
    public function guardarPatio(Request $request){

        $patio = $request -> validate([
            'nombre' => 'required|string|max:255',
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'z' => 'required|numeric',
            'id_gestor' => 'required|exists:gestor,id',
        ]);

        $patio['capacidad'] = $patio['x'] * $patio['y'] * $patio['z'];
        $patio['id_gestor'] = Auth::id();

        try {
            $nuevoPatio=Patio::create($patio);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el patio.',
                'error' => $e->getMessage(),
            ], 500);
        }

        session(['id_patio' => $nuevoPatio->id]);

        return redirect()->route('crearPatio');

    }

    public function guardarZona(Request $request){

        $zona = $request -> validate([
            'nombre' => 'required|string|max:255',
            'X' => 'required|numeric',
            'Y' => 'required|numeric',
            'Z' => 'required|numeric',
            'id_gestor' => 'required|integer|exists:gestor,id',
            'id_patio' => 'required|integer|exists:patio,id',
        ]);

        $patio = Patio::findOrFail($zona['id_patio']);

        if ($patio) {
            $zona['ubicacion'] = $patio->nombre;
        } else {
            $zona['ubicacion'] = null;
        }

        $zona['capacidad'] = $zona['X'] * $zona['Y'] * $zona['Z'];


        try {
            Zona::create($zona);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la zona.',
                'error' => $e->getMessage(),
            ], 500);
        }

        return view('Gestor.crearPatio');
    }

    public function verZona() {
         $zonas = Zona::select(['nombre', 'X', 'Y', 'Z']);
        return datatables()->of($zonas)->make(true);
    }

    }


