<?php

namespace Src\JobPortal\Company\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;

class CompanySearchByIdUseCase
{
    private CompanyRepositoryContract $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyId $id): Response
    {
        $response = $this->repository->searchById($id);

        if (!$response) {
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
