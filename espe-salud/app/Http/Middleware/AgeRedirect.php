<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\AgeRouterServiceInterface;
use App\Models\AgeLog;

class AgeRedirect
{
    //Inyectamos por constructor el servicio que nos da la clasificación y la ruta según la edad.
    public function __construct(
        protected AgeRouterServiceInterface $routerService
    ) {}

    //Se maneja la petición antes de que llegue al controlador.
    public function handle(Request $request, Closure $next)
    {
        // 1 Validacion Bbasica
        // Recuperamos el valor de age del formulario.
        $age = $request->input('age');

        // Si no existe 'age' o no es un número, redirigimos al error.
        if (!isset($age) || !is_numeric($age)) {
            return redirect()
                ->route('error.age')
                ->with('message', 'Edad inválida.');
        }

        // Convertimos a entero para comparaciones de rango.
        $age = (int) $age;

        // Si la edad está fuera del rango, error.
        if ($age < 0 || $age > 120) {
            return redirect()
                ->route('error.age')
                ->with('message', 'Edad fuera de rango (0–120).');
        }

        // 2 Clasificacion y ruta
        try {
            // Pedimos al servicio la clave de clasificación por ejemplo ninos
            $classification = $this->routerService->getClassification($age);
            // Y la ruta asociada /ninos
            $route          = $this->routerService->getRoute($classification);
        } catch (\InvalidArgumentException $e) {
            // Si el servicio no funiona mandamos error
            return redirect()
                ->route('error.age')
                ->with('message', $e->getMessage());
        }

        // 3 Rregistro en base de datos
        // Guardamos un log con la edad ingresada y su clasificación
        AgeLog::create([
            'age'            => $age,
            'classification' => $classification,
        ]);

        // 4 Guardar en sesión
        // Para proteger las rutas despues de la redirección
        $request->session()->put([
            'age'            => $age,
            'classification' => $classification,
        ]);

        // 5 FIn
        // Llevamos al usuario a la ruta correspondiente
        return redirect()->to("/{$route}");
    }
}
