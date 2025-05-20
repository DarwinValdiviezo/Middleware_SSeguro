<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAgeClassification
{
    //Este middleware protege las rutas destino , prrimero pasas por el formulario y que su clasificación en sesión coincida con la ruta que intenta visitar.

    public function handle(Request $request, Closure $next)
    {
        // 1 Obtenemos la clasificación de la sesión
        //    Ésta la puso AgeRedirect tras validar y clasificar la edad
        $classification = $request->session()->get('classification');

        // Si no hay clasificación redirigimos al formulario de edad.
        if (! $classification) {
            return redirect()->route('age.form');
        }

        // 2 Obtenemos la ruta actual
        $currentRoute = $request->route()->getName();

        // Si se pone una ruta diferente a la clasificación se redirige al formulario de edad.
        if ($currentRoute !== $classification) {
            return redirect()->route('age.form');
        }

        // Si todo está bien dejamos pasar la petición al controlador.
        return $next($request);
    }
}
