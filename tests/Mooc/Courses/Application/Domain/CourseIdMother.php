<?php

declare(strict_types = 1);

namespace Tests\Mooc\Courses\Application\Domain;

use Src\Mooc\Courses\Domain\CourseId;
use Tests\Shared\Domain\UuidMother;

final class CourseIdMother
{
    public static function create(string $value): CourseId
    {
        return new CourseId($value);
    }

    public static function random(): CourseId
    {
        return self::create(UuidMother::random());
    }
}