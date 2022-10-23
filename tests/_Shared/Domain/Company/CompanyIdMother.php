<?php

namespace Tests\_Shared\Domain\Company;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Tests\_Shared\Domain\UuidMother;

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
