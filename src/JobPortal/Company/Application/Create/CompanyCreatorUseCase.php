<?php

namespace Src\JobPortal\Company\Application\Create;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;

class CompanyCreatorUseCase
{
    private $repository;

    public function __construct(CompanyRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyCreatorRequest $request)
    {
        $id = new CompanyId($request->id());
        $name = new CompanyName($request->name());
        $sector = new CompanySector($request->duration());

        $company = new Company($id, $name, $sector);

        $this->repository->save($company);
    }
}
