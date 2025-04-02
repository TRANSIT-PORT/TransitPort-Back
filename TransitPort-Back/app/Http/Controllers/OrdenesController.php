<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;

class OrdenesController extends Controller
{
    public function index(Request $request)
    {
        $idUser = $request->input('id_operador');
        $task = Orden::with(['buque', 'tiene_buque', 'contenedor', 'zona', 'truck', 'train', 'tiene_train', 'tiene_truck'])
                        ->where('id_operador', $idUser)
                        ->where('estado', '!=', 'Completada')->get();
        return $task;
    }
    
}
