<?php

namespace Src\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;

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
        $model = EloquentCompanyModel::where('id', $id->value())->first();

        if (null === $model) {
            return null;
        }

        return new Company(
            new CompanyId($model->id),
            new CompanyName($model->name),
            new CompanySector($model->sector)
        );
    }

    public function count(): int
    {
        return EloquentCompanyModel::count();
    }

    public function getAllIConvertedArray(): array
    {
        return EloquentCompanyModel::get()->toArray();
    }
}
