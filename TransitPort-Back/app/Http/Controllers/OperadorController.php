<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
