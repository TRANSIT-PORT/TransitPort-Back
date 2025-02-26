<?php

namespace App\Http\Controllers;

use App\Models\Operador;
use Illuminate\Http\Request;

class OperadorController extends Controller {
    public function index(Request $request) {
        $task = Operador::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function perfil(){

        return view('Operador.perfil');

    }
}
