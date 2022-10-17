<?php

declare(strict_types = 1);

namespace Tests\Mooc\Courses\Application\Create;

use Src\Mooc\Courses\Application\Create\CreateCourseRequest;
use Src\Mooc\Courses\Domain\CourseDuration;
use Src\Mooc\Courses\Domain\CourseId;
use Src\Mooc\Courses\Domain\CourseName;
use Tests\Mooc\Courses\Application\Domain\CourseDurationMother;
use Tests\Mooc\Courses\Application\Domain\CourseIdMother;
use Tests\Mooc\Courses\Application\Domain\CourseNameMother;

final class CreateCourseRequestMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): CreateCourseRequest
    {
        return new CreateCourseRequest($id->value(), $name->value(), $duration->value());
    }

    public static function random(): CreateCourseRequest
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}
