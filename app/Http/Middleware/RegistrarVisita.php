<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visita;

class RegistrarVisita
{
    public function handle(Request $request, Closure $next)
    {
        // Evita registrar visitas do admin ou ajax
        if (!$request->is('admin/*') && !$request->ajax()) {

            Visita::create([
                'url' => $request->path(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
        }

        return $next($request);
    }
}