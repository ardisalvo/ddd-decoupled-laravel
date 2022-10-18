<?php

namespace Src\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyModel;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;

class EloquentCompanyRepository implements CompanyRepositoryContract
{

    public function save(Company $company): void
    {
        $result = EloquentCompanyModel::create([
            'id' => $company->id()->value(),
            'name' => $company->name()->value(),
            'sector' => $company->sector()->value()
        ]);
    }

    public function search(CompanyId $id): ?Company
    {
        // TODO: Implement search() method.
    }
}
