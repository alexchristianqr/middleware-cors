<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     *
     * @Developer Alex Christian(https://github.com/acqrdeveloper/configCors)
     * @Cors es un middleware que tiene la configuración de (Cross Origin Resource Sharing);
     *
     */

    /**
     * Handle an incoming request.
     *
     * Configuración para RESTFULL
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->ajax() || $request->method() === 'OPTIONS') {/* Aplicamos seguridad de entrada y salida de una solicitud */
            return $next($request)
                ->header('Access-Control-Allow-Origin', '*')/* Agregamos el comodin '*', para el acceso a los recursos locales */
                ->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS')/* Agregamos los metodos permitidos */
                ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, X-Access-Header');/* Agregamos las cabeceras permitidas */
        } else {
            return abort(404);
        }
    }
}	
