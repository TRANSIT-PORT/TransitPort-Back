<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    public function index(Request $request) {
        $task = User::all();
        return $task;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }
}