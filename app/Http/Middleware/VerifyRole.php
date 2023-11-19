<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class VerifyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Verificar si el usuario está autenticado
        if (Auth::check())
        {
            // Verificar si el rol del usuario está en la lista permitida
            if (in_array(Auth::user()->role, $roles))
            {
                return $next($request);
            }
        }

        // Si el usuario no tiene el rol permitido, redirigir o responder según sea necesario
        return redirect()->route('home')->with('danger.message', 'Acceso no autorizado. Tenés que ser administrador/a para poder ingresar.');
    }
}
