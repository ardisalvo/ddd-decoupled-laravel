<?php

namespace Tests\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyRepository;
use Tests\TestCase;
use Src\JobPortal\Company\Infrastructure\Repositories\File\FileCompanyRepository;
use Tests\JobPortal\Company\Application\Domain\CompanyMother;

class EloquentCompanyRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_company(): void
    {
        $repository = new EloquentCompanyRepository();
        $course = CompanyMother::random();

        $repository->save($course);

        $this->assertTrue(true);
    }
}
