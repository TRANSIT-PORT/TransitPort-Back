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
        $id_zona = $request->input('id_zona');
        $gruas = $request->input('gruas');

        foreach ($gruas as $grua) {
            Pertenece::create([
                'id_grua' => $grua['id'],
                'id_zona' => $id_zona,
                'fecha' => now()->toDateString(),
                'hora' => now()->toTimeString(),
            ]);
        }

        return response()->json(['message' => 'Grúas asignadas correctamente']);
    }
}
