<?php

namespace Src\JobPortal\Company\Application\Create;

use Illuminate\Http\Response;
use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;

class CompanyCreateUseCase
{
    private CompanyRepositoryContract $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyCreateRequest $request): Response
    {
        $company = new Company($request->id(), $request->name(), $request->sector(), $request->status());

        $response = $this->repository->create($company);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Candidate successfully created.',
            'id' => $response->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new CompanyException("Company cant be created", 500);
    }
}
