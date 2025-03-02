<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    public function index()
    {
        $zonas = Zona::all();
        return response()->json($zonas);
    }
}