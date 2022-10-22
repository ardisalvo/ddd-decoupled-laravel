<?php

namespace Src\JobPortal\Application\Infrastructure\Services;

use Carbon\Laravel\ServiceProvider;
use Src\JobPortal\Application\Application\Create\ApplicationCreateUseCase;
use Src\JobPortal\Application\Application\Delete\ApplicationDeleteByIdUseCase;
use Src\JobPortal\Application\Application\Search\ApplicationSearchAllUseCase;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByCandidateIdUseCase;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByIdUseCase;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByOfferIdUseCase;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Infrastructure\Repositories\Eloquent\EloquentApplicationRepository;

final class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->when(ApplicationCreateUseCase::class)
            ->needs(ApplicationRepositoryContract::class)
            ->give(EloquentApplicationRepository::class);

        $this->app->when(ApplicationSearchAllUseCase::class)
            ->needs(ApplicationRepositoryContract::class)
            ->give(EloquentApplicationRepository::class);

        $this->app->when(ApplicationSearchByIdUseCase::class)
            ->needs(ApplicationRepositoryContract::class)
            ->give(EloquentApplicationRepository::class);

        $this->app->when(ApplicationSearchByCandidateIdUseCase::class)
            ->needs(ApplicationRepositoryContract::class)
            ->give(EloquentApplicationRepository::class);

        $this->app->when(ApplicationSearchByOfferIdUseCase::class)
            ->needs(ApplicationRepositoryContract::class)
            ->give(EloquentApplicationRepository::class);

        $this->app->when(ApplicationDeleteByIdUseCase::class)
            ->needs(ApplicationRepositoryContract::class)
            ->give(EloquentApplicationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
