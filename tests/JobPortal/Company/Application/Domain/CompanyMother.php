<?php

declare(strict_types=1);

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Company\Application\Create\CompanyCreateRequest;
use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyStatus;

final class CompanyMother
{
    public static function create(
        CompanyId $id,
        CompanyName $name,
        CompanySector $sector,
        CompanyStatus $status
    ): Company {
        return new Company($id, $name, $sector, $status);
    }

    public static function fromRequest(CompanyCreateRequest $request): Company
    {
        return self::create(
            CompanyIdMother::create($request->id()),
            CompanyNameMother::create($request->name()),
            CompanySectorMother::create($request->sector()),
            CompanyStatusMother::create($request->status())
        );
    }

    public static function random(): Company
    {
        return self::create(
            CompanyIdMother::random(),
            CompanyNameMother::random(),
            CompanySectorMother::random(),
            CompanyStatusMother::random()
        );
    }
}
