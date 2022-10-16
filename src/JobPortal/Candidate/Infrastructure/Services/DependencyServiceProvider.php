<?php

namespace Src\JobPortal\Candidate\Infrastructure\Services;


use Carbon\Laravel\ServiceProvider;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchAllUseCase;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\CandidateRepository;

final class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(CandidateSearchAllUseCase::class)
            ->needs(CandidateRepositoryContract::class)
            ->give(CandidateRepository::class);
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
