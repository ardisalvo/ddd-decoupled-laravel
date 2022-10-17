<?php

declare(strict_types = 1);

namespace Tests\Mooc\Courses\Application\Domain;

use Src\Mooc\Courses\Domain\CourseName;
use Tests\Shared\Domain\WordMother;

final class CourseNameMother
{
    public static function create(string $value): CourseName
    {
        return new CourseName($value);
    }

    public static function random(): CourseName
    {
        return self::create(WordMother::random());
    }
}
