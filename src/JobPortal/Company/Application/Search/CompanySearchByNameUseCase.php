<?php

namespace Src\JobPortal\Company\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;

class CompanySearchByNameUseCase
{
    private CompanyRepositoryContract $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyName $name): Response
    {
        $response = $this->repository->searchByName($name);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'List of companies:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception(): void
    {
        throw new CompanyException("There are no companies in the database.", 500);
    }
}
