<?php

declare(strict_types = 1);

namespace Src\Mooc\Courses\Infrastructure;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\Candidate;
use Src\Mooc\Courses\Domain\Course;
use Src\Mooc\Courses\Domain\CourseId;
use Src\Mooc\Courses\Domain\CourseRepository;

final class FileCourseRepository implements CourseRepository
{


    private const FILE_PATH = __DIR__ . '/courses';

    public function save(Course $course): void
    {
        $result= Candidate::create([
           'first_name' => 'A',
           'last_name' => 'B',
            'phone' => '622622622',
            'email' => 'a@a.com'
        ]);

        file_put_contents($this->fileName($course->id()->value()), serialize($course));
    }

    public function search(CourseId $id): ?Course
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
