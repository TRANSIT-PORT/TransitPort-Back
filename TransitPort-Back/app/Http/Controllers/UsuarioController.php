<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

    public function index(Request $request) {

        $usuarios = User::where('cargo', '!=', 'gestor')->get();//sirve para extraer solo los usuarios que no sean gestores
        return $usuarios;

    }

    public function modificarEstado(Request $request, $id) {
        // Validar la solicitud
        $request->validate([
            'estado' => 'required|string|in:Activo/a,Inactivo/a', // Validar el estado
        ]);
    
        // Buscar el usuario y actualizar su estado
        $user = User::findOrFail($id);
        $user->estado = $request->input('estado');
        $user->save();
    
        return response()->json([
            'message' => 'Estado actualizado correctamente',
            'estado' => $user->estado,
        ]);
    }

}
