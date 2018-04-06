<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
	 *
	 * Configuración para RESTFULL
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*') //Acceso al control del API
            ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS') //Metodos permitidos 
            ->header('Access-Control-Allow-Headers', 'X-Requested-With, X-Api-AppKey'); //Cabeceras permitidas
    }
}
