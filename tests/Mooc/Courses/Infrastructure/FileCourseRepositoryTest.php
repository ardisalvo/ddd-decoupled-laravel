<?php

declare(strict_types = 1);

namespace Tests\Mooc\Courses\Infrastructure;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\Mooc\Courses\Infrastructure\FileCourseRepository;
use Tests\Mooc\Courses\Application\Domain\CourseIdMother;
use Tests\Mooc\Courses\Application\Domain\CourseMother;
use Tests\TestCase;


final class FileCourseRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course     = CourseMother::random();

        $repository->save($course);
    }

    /** test */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $course     = CourseMother::random();

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }

    /** test */
    public function it_should_not_return_a_non_existing_course(): void
    {
        $repository = new FileCourseRepository();

        $this->assertNull($repository->search(CourseIdMother::random()));
    }
}
