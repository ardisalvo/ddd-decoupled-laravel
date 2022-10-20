<?php

namespace Src\JobPortal\Company\Infrastructure\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        Route::prefix('api/job-portal/companies')
            ->group(base_path('src/JobPortal/Company/Infrastructure/Routes/Api.php'));
    }
}
