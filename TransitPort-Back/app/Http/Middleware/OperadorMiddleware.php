<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class OperadorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {    //si está autentificado
            if (Auth::user()->cargo == "operador") {   //si es role es gestor

                return $next($request);    //significa continua
            }
        }
        return redirect()->route('login');  //en caso contrario va al login.
    }
}
