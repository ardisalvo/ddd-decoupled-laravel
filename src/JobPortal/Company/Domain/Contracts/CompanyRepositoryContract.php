<?php

namespace Src\JobPortal\Company\Domain\Contracts;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;

use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyModel;

interface CompanyRepositoryContract
{
    public function create(Company $company): CompanyId|null;

    public function search(CompanyId $id): ?Company;

    public function count(): int;

    public function getAllIConvertedArray(): array;
}
