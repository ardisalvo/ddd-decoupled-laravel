<?php

namespace Src\JobPortal\Company\Application\Delete;

use Src\JobPortal\Company\Domain\Exceptions\CompanyException;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;

class CompanyDeleteByIdUseCase
{
    private CompanyRepositoryContract $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyId $id)
    {
        $response = $this->repository->deleteById($id);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'Company deleted',
            'data' => $id->value(),
        ], 200);
    }

    private function exception()
    {
        throw new CompanyException("The company could not be deleted. Please verify that the ID is correct and that the company exists.", 500);
    }
}
