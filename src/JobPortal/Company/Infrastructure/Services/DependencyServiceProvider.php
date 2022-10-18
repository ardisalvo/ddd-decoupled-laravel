<?php

namespace Src\JobPortal\Company\Infrastructure\Services;


use Carbon\Laravel\ServiceProvider;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use Src\JobPortal\Candidate\Application\Delete\CandidateDeleteByIdUseCase;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchAllUseCase;
use Src\JobPortal\Candidate\Application\Update\CandidateUpdateUseCase;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Delete\CandidateDeleteByIdController;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\CandidateRepository;
use Src\JobPortal\Company\Application\Create\CompanyCreateUseCase;
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
