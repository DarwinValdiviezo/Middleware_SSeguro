<?php

namespace App\Services;

/**
 * Interface AgeRouterServiceInterface
 *
 * Define el contrato (los métodos obligatorios) para cualquier servicio
 * que convierta una edad en una clasificación y luego en una ruta.
 *
 * Esto permite desacoplar completamente la lógica de mapeo
 * de las clases que lo consumen (por ejemplo, nuestro middleware),
 * siguiendo el Principio de Inversión de Dependencias (D de SOLID).
 */
interface AgeRouterServiceInterface
{
    /**
     * Dada una edad (entero), devuelve la clave de clasificación.
     *
     * Por ejemplo:
     *  - Si $age = 4  → devuelve "bebes"
     *  - Si $age = 30 → devuelve "adultos"
     */
    public function getClassification(int $age): string;

    /**
     * Dada una clasificación (clave), devuelve la ruta destino.
     *
     * Por ejemplo:
     *  - Si $classification = "ninos" → devuelve "ninos"
     *  (para redirect()->to("/ninos"))

     */
    public function getRoute(string $classification): string;
}
