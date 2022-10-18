<?php

namespace Src\JobPortal\Company\Application\Create;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;

class CompanyCreateUseCase
{
    private $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyCreateRequest $request)
    {
        $company = new Company($request->id(), $request->name(), $request->sector());

        $this->repository->save($company);
    }
}
