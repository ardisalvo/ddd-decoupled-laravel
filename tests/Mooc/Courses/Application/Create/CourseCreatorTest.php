<?php

namespace Tests\Mooc\Courses\Application\Create;

use Src\Mooc\Courses\Application\Create\CourseCreator;
use Src\Mooc\Courses\Domain\CourseRepository;
use Tests\Mooc\Courses\Application\Domain\CourseMother;
use Tests\TestCase;


final class CourseCreatorTest extends TestCase
{
    /** test */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator    = new CourseCreator($repository);

        $request = CreateCourseRequestMother::random();

        $course  = CourseMother::fromRequest($request);

        $repository->method('save')->with($course);

        $creator->__invoke($request);
    }
}
