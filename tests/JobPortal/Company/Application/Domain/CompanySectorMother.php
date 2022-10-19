<?php

namespace Tests\JobPortal\Company\Application\Domain;

use Src\JobPortal\Company\Domain\ValueObjects\CompanySector;
use Tests\Shared\Domain\IntegerMother;
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
                sprintf(
                    '%s %s',
                    IntegerMother::random(),
                    RandomElementPicker::from('months', 'years', 'days', 'hours', 'minutes', 'seconds')
                )
            )
        );
    }
}
