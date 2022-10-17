<?php

declare(strict_types = 1);

namespace Src\Mooc\Courses\Application\Create;

use Src\Mooc\Courses\Domain\Course;
use Src\Mooc\Courses\Domain\CourseDuration;
use Src\Mooc\Courses\Domain\CourseId;
use Src\Mooc\Courses\Domain\CourseName;
use Src\Mooc\Courses\Domain\CourseRepository;

final class CourseCreator
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request)
    {
        $id       = new CourseId($request->id());
        $name     = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());

        $course = new Course($id, $name, $duration);

        $this->repository->save($course);
    }
}
