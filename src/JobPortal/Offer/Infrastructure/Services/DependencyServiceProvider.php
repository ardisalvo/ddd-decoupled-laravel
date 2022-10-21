<?php

namespace Src\JobPortal\Offer\Infrastructure\Services;

use Carbon\Laravel\ServiceProvider;
use Src\JobPortal\Offer\Application\Create\OfferCreateUseCase;
use Src\JobPortal\Offer\Application\Delete\OfferDeleteByIdUseCase;
use Src\JobPortal\Offer\Application\Search\OfferSearchAllUseCase;
use Src\JobPortal\Offer\Application\Search\OfferSearchByCompanyIdUseCase;
use Src\JobPortal\Offer\Application\Search\OfferSearchByIdUseCase;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use Src\JobPortal\Offer\Infrastructure\Repositories\Eloquent\EloquentOfferRepository;

final class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->when(OfferCreateUseCase::class)
            ->needs(OfferRepositoryContract::class)
            ->give(EloquentOfferRepository::class);

        $this->app->when(OfferSearchAllUseCase::class)
            ->needs(OfferRepositoryContract::class)
            ->give(EloquentOfferRepository::class);


        $this->app->when(OfferSearchByIdUseCase::class)
            ->needs(OfferRepositoryContract::class)
            ->give(EloquentOfferRepository::class);


        $this->app->when(OfferSearchByCompanyIdUseCase::class)
            ->needs(OfferRepositoryContract::class)
            ->give(EloquentOfferRepository::class);

        $this->app->when(OfferDeleteByIdUseCase::class)
            ->needs(OfferRepositoryContract::class)
            ->give(EloquentOfferRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
