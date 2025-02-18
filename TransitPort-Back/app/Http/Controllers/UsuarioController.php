<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller {
    public function index(Request $request) {
        $usuarios = User::where('cargo', '!=', 'Gestor')->get();
        return $usuarios;
     }
}
