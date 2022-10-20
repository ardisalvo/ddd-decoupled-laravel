<?php

namespace Src\JobPortal\Candidate\Infrastructure\Services;

use Carbon\Laravel\ServiceProvider;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use Src\JobPortal\Candidate\Application\Delete\CandidateDeleteByIdUseCase;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchAllUseCase;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchByEmailUseCase;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchByIdUseCase;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\EloquentCandidateRepository;

final class DependencyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->when(CandidateCreateUseCase::class)
            ->needs(CandidateRepositoryContract::class)
            ->give(EloquentCandidateRepository::class);

        $this->app->when(CandidateSearchAllUseCase::class)
            ->needs(CandidateRepositoryContract::class)
            ->give(EloquentCandidateRepository::class);


        $this->app->when(CandidateSearchByIdUseCase::class)
            ->needs(CandidateRepositoryContract::class)
            ->give(EloquentCandidateRepository::class);


        $this->app->when(CandidateSearchByEmailUseCase::class)
            ->needs(CandidateRepositoryContract::class)
            ->give(EloquentCandidateRepository::class);

        $this->app->when(CandidateDeleteByIdUseCase::class)
            ->needs(CandidateRepositoryContract::class)
            ->give(EloquentCandidateRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
    }
}
