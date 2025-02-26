<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;

class OrdenesController extends Controller
{
    public function index(Request $request)
    {
        $idUser = $request->input('id_user');
        $task = Orden::with(['buque', 'tiene', 'zona', 'contenedor'])->where('id_user', $idUser)->get();
        return $task;
    }
}
