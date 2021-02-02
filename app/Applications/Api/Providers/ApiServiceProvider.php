<?php

namespace App\Applications\Api\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;


class ApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //$this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('app/Applications/Api/Http/Routes.php'));
        });
    }
}
