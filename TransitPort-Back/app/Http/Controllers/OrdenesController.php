<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;

class OrdenesController extends Controller
{
    public function index(Request $request)
    {
        $task = Orden::all();
        return $task;
    }
}
