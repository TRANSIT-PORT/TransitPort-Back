<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    public function index(Request $request) {
        $usuarios = User::where('cargo', '!=', 'Gestor')->get();//sirve para extraer solo los usuarios que no sean gestores
        return $usuarios;
     }
}
