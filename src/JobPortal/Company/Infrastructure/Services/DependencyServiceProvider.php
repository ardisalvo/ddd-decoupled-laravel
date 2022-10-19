<?php

namespace Src\JobPortal\Company\Infrastructure\Services;


use Carbon\Laravel\ServiceProvider;
use Src\JobPortal\Company\Application\Create\CompanyCreateUseCase;
use Src\JobPortal\Company\Application\Search\CompanySearchAllUseCase;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyRepository;

final class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(CompanyCreateUseCase::class)
            ->needs(CompanyRepositoryContract::class)
            ->give(EloquentCompanyRepository::class);

        $this->app->when(CompanySearchAllUseCase::class)
            ->needs(CompanyRepositoryContract::class)
            ->give(EloquentCompanyRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
