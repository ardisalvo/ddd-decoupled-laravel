<?php

namespace Src\JobPortal\Company\Application\Search;

use Src\JobPortal\Company\Domain\Exceptions\CompanyException;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use \Illuminate\Http\Response;

class CompanySearchAllUseCase
{
    private CompanyRepositoryContract $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Response
    {
        $response = $this->repository->getAll();

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'List of companies:',
            'data' => $response,
        ], 200);
    }

    private function exception(): void
    {
        throw new CompanyException("There are no companies in the database.", 500);
    }
}
