<?php

namespace Src\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\Contracts\CompanyRepositoryContract;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;

class EloquentCompanyRepository implements CompanyRepositoryContract
{

    public function create(Company $company): CompanyId|null
    {
        $result = EloquentCompanyModel::create([
            'id' => $company->id()->value(),
            'name' => $company->name()->value(),
            'sector' => $company->sector()->value(),
            'status' => $company->status()->value(),
        ]);

        if ($result) {
            return new CompanyId($result->id);
        }

        return null;
    }

    public function searchById(CompanyId $id): ?EloquentCompanyModel
    {
        return EloquentCompanyModel::where('id', $id)->first();
    }

    public function count(): int
    {
        return EloquentCompanyModel::count();
    }

    public function getAll(): ?Collection
    {
        return EloquentCompanyModel::orderBy('created_at', 'DESC')->get();
    }

    public function searchByName(CompanyName $name): ?EloquentCompanyModel
    {
        return EloquentCompanyModel::where('name', $name)->first();
    }

    public function deleteById(CompanyId $id): int
    {
        return EloquentCompanyModel::where('id', $id)->delete();
    }
}
