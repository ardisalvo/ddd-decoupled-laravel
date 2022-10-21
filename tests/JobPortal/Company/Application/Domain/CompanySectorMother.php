<?php

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Tests\Shared\Domain\RandomElementPicker;

final class CompanySectorMother
{
    public static function create(CompanySector $value): CompanySector
    {
        return $value;
    }

    public static function random(): CompanySector
    {
        return self::create(
            new CompanySector(
                RandomElementPicker::from(
                    'Marketing and sales',
                    'E-commerce',
                    'Digital payments',
                    'B2C e-commerce',
                    'B2B e-commerce',
                )
            )
        );
    }
}
