<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertenece;
use App\Models\Grua;

class GruaController extends Controller
{
    public function index()
    {
        $gruas = Grua::all();
        return response()->json($gruas);
    }

    public function asignarGrua(Request $request)
    {

        $request->validate([
            'id_zona' => 'required|integer|exists:zonas,id', 
            'id_grua' => 'required|integer|exists:gruas,id', 
        ]);

        $id_zona = $request->input('id_zona');
        $id_grua = $request->input('id_grua');

        Pertenece::create([
            'id_grua' => $id_grua,
            'id_zona' => $id_zona,
            'fecha' => now()->toDateString(),
            'hora' => now()->toTimeString(), 
        ]);

        
        return response()->json(['message' => 'Grúa asignada correctamente']);
    }
}
