<?php

namespace Src\JobPortal\Offer\Infrastructure\Services;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapRoutes();
    }

    public function mapRoutes()
    {
        Route::prefix('api/job-portal/offers')
            ->group(base_path('src/JobPortal/Offer/Infrastructure/Routes/Api.php'));
    }
}
