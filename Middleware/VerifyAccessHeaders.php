<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccessHeaders
{
    /**
     *
     * @Developer Alex Christian(https://github.com/acqrdeveloper/configCors)
     * @VerifyAaccessHeaders es un middleare que permite verificar de manera segura el acceso de las peticiones;
     *
     */

    /**
     * Handle an incoming request.
	 * 
	 * Valida valor de cabecera permitida
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = null;
        if ($request->ajax()) {/* Aplicamos seguridad de entrada y salida de una solicitud */
            if ($request->hasHeader("X-Access-Header")) {/* Validamos tener una cabecera permitida */
                if ($request->header("X-Access-Header") == config()["app"]["app_key"]) {/* Validamos la valoracion */
                    $response = $next($request);
                }
            } else {
                $response = response()->json("User Unhautorized", 401);
            }
            return $response;
        } else {
            return abort(404);
        }
    }
}
