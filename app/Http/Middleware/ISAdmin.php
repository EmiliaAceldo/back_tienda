<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ISAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Verificar si el usuario es un administrador
       if ($request->user() && $request->user()->rol === 'admin') {
            return $next($request);
        }

        // Si no es administrador, retornar un error 403
        return response()->json(['message' => 'Acceso denegado'], 403);
           
       }
    
}
