<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccessHeaders
{
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
        if ($request->hasHeader("X-Api-AppKey")) {
            if ($request->header("X-Api-AppKey") == config()["app"]["app_key"]) $response = $next($request);
        } else {
            $response = response()->json("User Unhautorized", 401);
        }
        return $response;
    }
}
