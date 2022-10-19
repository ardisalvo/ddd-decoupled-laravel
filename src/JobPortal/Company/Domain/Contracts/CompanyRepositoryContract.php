<?php

namespace Src\JobPortal\Company\Domain\Contracts;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyModel;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyRepository;

interface CompanyRepositoryContract
{
    public function create(Company $company): CompanyId|null;

    public function searchById(CompanyId $id): ?Company;

    public function searchByName(CompanyName $name): ?EloquentCompanyModel;

    public function deleteById(CompanyId $id): int;

    public function count(): int;

    public function getAllIConvertedArray(): array;
}
