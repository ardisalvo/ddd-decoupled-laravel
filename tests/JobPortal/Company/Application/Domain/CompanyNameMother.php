<?php

declare(strict_types=1);

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanyName;
use Tests\Shared\Domain\RandomElementPicker;
use Tests\Shared\Domain\WordMother;

final class CompanyNameMother
{
    public static function create(CompanyName $value): CompanyName
    {
        return $value;
    }

    public static function random(): CompanyName
    {
        return self::create(
            new CompanyName(
                RandomElementPicker::from(
                    'Google',
                    'Glovo',
                    'Uber',
                    'Tesla',
                )
            )
        );
    }
}
