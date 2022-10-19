<?php

namespace Src\JobPortal\Company\Application\Search;

use Src\JobPortal\Company\Domain\Exceptions\CompanyException;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;

class CompanySearchByNameUseCase
{
    private CompanyRepositoryContract $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyName $name)
    {
        $response = $this->repository->searchByName($name);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'List of companies:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception()
    {
        throw new CompanyException("There are no companies in the database.", 500);
    }
}
