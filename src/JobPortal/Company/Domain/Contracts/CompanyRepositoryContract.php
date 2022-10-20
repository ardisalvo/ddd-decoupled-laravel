<?php

namespace Src\JobPortal\Company\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyModel;

interface CompanyRepositoryContract
{
    public function create(Company $company): CompanyId|null;

    public function searchById(CompanyId $id): ?Company;

    public function searchByName(CompanyName $name): ?EloquentCompanyModel;

    public function deleteById(CompanyId $id): int;

    public function count(): int;

    public function getAll(): ?Collection;
}
