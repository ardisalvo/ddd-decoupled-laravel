<?php

namespace Tests\JobPortal\Company\Infrastructure\Repositories\File;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\JobPortal\Company\Infrastructure\Repositories\File\FileCompanyRepository;
use Tests\JobPortal\Company\Application\Domain\CompanyIdMother;
use Tests\JobPortal\Company\Application\Domain\CompanyMother;
use Tests\TestCase;

class FileCompanyRepositoryTest_ extends TestCase
{
    use RefreshDatabase;

    /** test */
    public function it_should_save_a_company(): void
    {
        $repository = new FileCompanyRepository();
        $course = CompanyMother::random();

        $repository->create($course);

        $this->assertTrue(true);
    }

    /** test */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCompanyRepository();
        $company = CompanyMother::random();

        $repository->create($company);

        $this->assertEquals($company, $repository->search($company->id()));
    }

    /** test */
    public function it_should_not_return_a_non_existing_course(): void
    {
        $repository = new FileCompanyRepository();

        $this->assertNull($repository->search(CompanyIdMother::random()));
    }
}
