<?php

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Tests\Shared\Domain\UuidMother;

final class CompanyIdMother
{
    public static function create(CompanyId $value): CompanyId
    {
        return $value;
    }

    public static function random(): CompanyId
    {
        return self::create(
            new CompanyId(
                UuidMother::random()
            )
        );
    }
}
