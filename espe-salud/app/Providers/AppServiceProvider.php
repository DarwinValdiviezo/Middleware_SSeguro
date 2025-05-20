<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AgeRouterService;
use App\Services\AgeRouterServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Aquí enlazamos (bind) la interfaz AgeRouterServiceInterface
     * con su implementación concreta AgeRouterService. Gracias a esto,
     * cuando Laravel vea una dependencia de AgeRouterServiceInterface
     * inyectada (por ejemplo en el middleware AgeRedirect), sabrá
     * automáticamente que debe instanciar AgeRouterService.
     */
    public function register()
    {
        $this->app->bind(
            AgeRouterServiceInterface::class,   // la interfaz
            AgeRouterService::class             // la clase concreta
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
