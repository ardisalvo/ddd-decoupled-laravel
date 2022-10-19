<?php

namespace Tests\JobPortal\Company\Infrastructure\Repositories\Eloquent;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Src\JobPortal\Company\Application\Create\CompanyCreateRequest;
use Src\JobPortal\Company\Domain\ValueObjects\CompanyId;
use Src\JobPortal\Company\Infrastructure\Controllers\Create\CompanyCreateRequestValidation;
use Src\JobPortal\Company\Infrastructure\Repositories\Eloquent\EloquentCompanyRepository;
use Tests\JobPortal\Company\Application\Domain\CompanyIdMother;
use Tests\JobPortal\Company\Application\Domain\CompanyNameMother;
use Tests\JobPortal\Company\Application\Domain\CompanySectorMother;
use Tests\JobPortal\Company\Application\Domain\CompanyStatusMother;
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
    public function it_should_save_a_random_company_without_validate(): void
    {
        $this->initializeVariables();

        $this->assertEquals(0, $this->repository->count());

        $company = CompanyMother::random();

        $this->repository->create($company);

        $this->assertEquals(1, $this->repository->count());
    }

    /** @test */
    public function it_should_save_ten_random_company(): void
    {
        $this->initializeVariables();

        $this->assertEquals(0, $this->repository->count());

        for ($x = 1; $x <= 10; $x++) {
            $this->request->replace([
                'id' => CompanyIdMother::random()->value(),
                'name' => CompanyNameMother::random()->value(),
                'sector' => CompanySectorMother::random()->value(),
                'status' => CompanyStatusMother::random()->value(),
            ]);
            $validation = Validator::make($this->request->all(), $this->requestValidation->rules());
            $this->assertFalse($validation->fails());

            $company = new CompanyCreateRequest($this->request);

            $company = CompanyMother::fromRequest($company);

            $this->repository->create($company);
        }

        $this->assertEquals(10, $this->repository->count());
    }

    /** @test */
    public function it_should_create_specific_uuid_company_then_verify_searching_uuid(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            'name' => CompanyNameMother::random()->value(),
            'sector' => CompanySectorMother::random()->value(),
            'status' => CompanyStatusMother::random()->value(),
        ]);

        $validation = Validator::make($this->request->all(), $this->requestValidation->rules());

        $this->assertFalse($validation->fails());

        $company = new CompanyCreateRequest($this->request);
        $this->assertEquals(0, $this->repository->count());

        $company = CompanyMother::fromRequest($company);

        $this->repository->create($company);

        $this->assertEquals(1, $this->repository->count());

        $results = $this->repository->searchById(new CompanyId($this->staticUuid));

        $this->assertEquals($this->staticUuid, $results->id()->value());
    }


    public function it_should_create_specific_uuid_company_then_delete_by_uuid(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            'name' => CompanyNameMother::random()->value(),
            'sector' => CompanySectorMother::random()->value(),
            'status' => CompanyStatusMother::random()->value(),
        ]);

        $validation = Validator::make($this->request->all(), $this->requestValidation->rules());

        $this->assertFalse($validation->fails());

        $company = new CompanyCreateRequest($this->request);
        $this->assertEquals(0, $this->repository->count());

        $company = CompanyMother::fromRequest($company);

        $this->repository->create($company);

        $this->assertEquals(1, $this->repository->count());

        $results = $this->repository->searchById(new CompanyId($this->staticUuid));

        $this->assertEquals($this->staticUuid, $results->id()->value());

        $this->repository->deleteById(new CompanyId($this->staticUuid));

        $this->assertEquals(0, $this->repository->count());
    }

    /** test */
    public function it_should_fail_create_because_missing_params(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => CompanyIdMother::random(),
            'name' => CompanyNameMother::random(),
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
