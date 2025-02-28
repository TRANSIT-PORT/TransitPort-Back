<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use App\Models\Orden;
use App\Models\User;
use App\Models\Tiene;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class OperadorController extends Controller {
    public function index(Request $request) {
        $task = Operador::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function perfil(){

        $usuario = Auth::user();

        return view('Operador.vistaPerfil', compact('usuario'));

    }

    public function verNotificaciones()
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $userId = $usuario->id;
        $task = Orden::where('id_user', $userId)->with('administrativo')->get();
        return view('Operador.vistaNotificaciones', compact('usuario', 'task'));
    }



}
