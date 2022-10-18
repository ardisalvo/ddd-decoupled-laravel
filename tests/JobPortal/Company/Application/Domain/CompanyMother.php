<?php

declare(strict_types=1);

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\Company;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreatorRequest;

final class CompanyMother
{
    public static function create(CompanyId $id, CompanyName $name, CompanySector $sector): Company
    {
        return new Company($id, $name, $sector);
    }

    public static function fromRequest(CompanyCreatorRequest $request): Company
    {
        return self::create(
            CompanyIdMother::create($request->id()),
            CompanyNameMother::create($request->name()),
            CompanySectorMother::create($request->sector())
        );
    }

    public static function random(): Company
    {
        return self::create(CompanyIdMother::random(), CompanyNameMother::random(), CompanySectorMother::random());
    }
}
