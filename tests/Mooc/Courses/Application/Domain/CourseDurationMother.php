<?php

declare(strict_types = 1);

namespace Tests\Mooc\Courses\Application\Domain;

use Src\Mooc\Courses\Domain\CourseDuration;
use Tests\Shared\Domain\IntegerMother;
use Tests\Shared\Domain\RandomElementPicker;

final class CourseDurationMother
{
    public static function create(string $value): CourseDuration
    {
        return new CourseDuration($value);
    }

    public static function random(): CourseDuration
    {
        return self::create(
            sprintf(
                '%s %s',
                IntegerMother::random(),
                RandomElementPicker::from('months', 'years', 'days', 'hours', 'minutes', 'seconds')
            )
        );
    }
}
