<?php

namespace Tests\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\JobPortal\Company\Application\Create\CompanyCreateRequest;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreateRequestValidation;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyRepository;
use Tests\TestCase;
use Tests\JobPortal\Company\Application\Domain\CompanyMother;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EloquentCompanyRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private null|Request $request;
    private null|CompanyCreateRequestValidation $requestValidation;
    private null|EloquentCompanyRepository $repository;
    private string $staticUuid;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->request = null;
        $this->requestValidation = null;
        $this->repository = null;
        $this->staticUuid = '49424436-4f25-11ed-bdc3-0242ac120002';
    }

    /** @test */
    public function it_should_save_a_random_company(): void
    {
        $this->initializeVariables();

        $this->assertEquals(0, $this->repository->count());

        $company = CompanyMother::random();

        $this->repository->save($company);

        $this->assertEquals(1, $this->repository->count());
    }

    /** @test */
    public function it_should_save_ten_random_company(): void
    {
        $this->initializeVariables();

        $this->assertEquals(0, $this->repository->count());

        for ($x = 1; $x <= 10; $x++) {
            $company = CompanyMother::random();
            $this->repository->save($company);
        }

        $this->assertEquals(10, $this->repository->count());
    }

    /** @test */
    public function it_should_specific_name_company(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            'name' => 'Google',
            'duration' => '1year'
        ]);

        $validation = Validator::make($this->request->all(), $this->requestValidation->rules());

        $this->assertFalse($validation->fails());

        $company = new CompanyCreateRequest($this->request);
        $this->assertEquals(0, $this->repository->count());

        $company = CompanyMother::fromRequest($company);

        $this->repository->save($company);

        $this->assertEquals(1, $this->repository->count());

        $results = $this->repository->search(new CompanyId($this->staticUuid));

        $this->assertEquals($this->staticUuid, $results->id()->value());
    }

    /** @test */
    public function it_should_fail_by_missing_params(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            //'name' => 'Google',
            'duration' => '1year'
        ]);

        $validation = Validator::make($this->request->all(), $this->requestValidation->rules());

        $this->assertTrue($validation->fails());

        $this->assertEquals(0, $this->repository->count());
    }

    private function initializeVariables()
    {
        $this->request = new Request();
        $this->requestValidation = new CompanyCreateRequestValidation();
        $this->repository = new EloquentCompanyRepository();
    }

}
