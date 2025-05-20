<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\BebesController;
use App\Http\Controllers\NinosController;
use App\Http\Controllers\AdolescentesController;
use App\Http\Controllers\JovenesController;
use App\Http\Controllers\AdultosController;
use App\Http\Controllers\MayoresController;
use App\Http\Controllers\LongevosController;
use App\Http\Middleware\AgeRedirect;
use App\Http\Middleware\EnsureAgeClassification;

// No tine controlador, pagina de incio
Route::view('/', 'welcome')
     ->name('welcome');

// Formulario de Edad
// GET /ingresar-edad:
// - Muestra el formulario de edad (`resources/views/age.blade.php`).
// - El formulario envía una petición POST a /procesar-edad.
// - Nombre de ruta: 'age.form'.
// - El controlador AgeController::showForm() no hace nada, solo retorna la vista.
// - El middleware AgeRedirect se encarga de la validación y redirección.
// - El controlador AgeController::process() no se invoca directamente, sino que
//   es interceptado por el middleware AgeRedirect.
// - El middleware AgeRedirect valida la edad, registra el intento y redirige
//   al portal correcto.
// - Si la validación falla, redirige a 'error.age'.
// - El middleware AgeRedirect también guarda la clasificación en la sesión.
// - El middleware EnsureAgeClassification protege las rutas de los portales,
//   asegurando que solo los usuarios con la clasificación correcta puedan
//   acceder a ellas.
Route::get('/ingresar-edad', [AgeController::class, 'showForm'])
     ->name('age.form');
// Ruta para procesar la edad
Route::post('/procesar-edad', [AgeController::class, 'process'])
     ->middleware(AgeRedirect::class)
     ->name('age.process');
// Ruta de error para edad inválida o fuera de rango
Route::get('/error-edad', fn() => view('error'))
     ->name('error.age');
// Rutas de los portales
Route::middleware([EnsureAgeClassification::class])->group(function () {
    // Portal de bebés (0–5 años)
    Route::get('/bebes', [BebesController::class, 'index'])
         ->name('bebes');

    // Portal de niños (6–12 años)
    Route::get('/ninos', [NinosController::class, 'index'])
         ->name('ninos');

    // Portal de adolescentes (13–17 años)
    Route::get('/adolescentes', [AdolescentesController::class, 'index'])
         ->name('adolescentes');

    // Portal de jóvenes adultos (18–25 años)
    Route::get('/jovenes', [JovenesController::class, 'index'])
         ->name('jovenes');

    // Portal de adultos (26–59 años)
    Route::get('/adultos', [AdultosController::class, 'index'])
         ->name('adultos');

    // Portal de adultos mayores (60–74 años)
    Route::get('/mayores', [MayoresController::class, 'index'])
         ->name('mayores');

    // Portal de longevos (75–120 años)
    Route::get('/longevos', [LongevosController::class, 'index'])
         ->name('longevos');
});
