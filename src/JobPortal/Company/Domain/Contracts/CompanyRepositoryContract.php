<?php

namespace Src\JobPortal\Company\Domain\Contracts;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;

interface CompanyRepositoryContract
{
    public function save(Company $company): void;

    public function search(CompanyId $id): ?Company;
}
