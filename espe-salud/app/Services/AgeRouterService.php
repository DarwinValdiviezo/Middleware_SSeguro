<?php

namespace App\Services;

use InvalidArgumentException;

class AgeRouterService implements AgeRouterServiceInterface
{
    /**
     * 1 Aquí definimos el “mapa” que relaciona cada clasificación
     *    con su rango de edades y la ruta destino.
     */
    private array $map = [
        'bebes'        => ['range' => [0, 5],    'route' => 'bebes'],
        'ninos'        => ['range' => [6, 12],   'route' => 'ninos'],
        'adolescentes' => ['range' => [13, 17],  'route' => 'adolescentes'],
        'jovenes'      => ['range' => [18, 25],  'route' => 'jovenes'],
        'adultos'      => ['range' => [26, 59],  'route' => 'adultos'],
        'mayores'      => ['range' => [60, 74],  'route' => 'mayores'],
        'longevos'     => ['range' => [75, 120], 'route' => 'longevos'],
    ];

    /**
     * 2 Devuelve la clasificación según la edad.
     *    - Recorre cada entrada de $map.
     *    - Extrae min y max de 'range'.
     *    - Si la edad cae dentro del rango, devuelve la clave.
     *    - Si no encuentra ninguna, lanza excepción.
     */
    public function getClassification(int $age): string
    {
        foreach ($this->map as $key => $data) {
            [$min, $max] = $data['range'];
            if ($age >= $min && $age <= $max) {
                return $key;
            }
        }
        throw new InvalidArgumentException('Edad inválida');
    }

    /**
     * 3 Dada una clasificación, devuelve la ruta a la que redirigir.
     *    - Verifica que exista en el mapa.
     *    - De lo contrario, lanza excepción.
     */
    public function getRoute(string $classification): string
    {
        if (isset($this->map[$classification])) {
            return $this->map[$classification]['route'];
        }
        throw new InvalidArgumentException('Clasificación inválida');
    }
}
