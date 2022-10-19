<?php

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanyStatus;
use Tests\Shared\Domain\RandomElementPicker;

final class CompanyStatusMother
{
    public static function create(CompanyStatus $value): CompanyStatus
    {
        return $value;
    }

    public static function random(): CompanyStatus
    {
        return self::create(
            new CompanyStatus(
                RandomElementPicker::from(0, 1)
            )
        );
    }
}
