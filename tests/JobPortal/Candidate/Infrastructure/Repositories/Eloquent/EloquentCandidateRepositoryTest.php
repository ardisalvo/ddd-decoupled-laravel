<?php

namespace Tests\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Create\CandidateCreateRequestValidation;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Delete\CandidateDeleteByIdRequestValidation;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ById\CandidateSearchByIdRequestValidation;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\EloquentCandidateRepository;
use Tests\JobPortal\Candidate\Application\Domain\CandidateEmailMother;
use Tests\JobPortal\Candidate\Application\Domain\CandidateFirstNameMother;
use Tests\JobPortal\Candidate\Application\Domain\CandidateIdMother;
use Tests\JobPortal\Candidate\Application\Domain\CandidateLastNameMother;
use Tests\JobPortal\Candidate\Application\Domain\CandidateMother;
use Tests\JobPortal\Candidate\Application\Domain\CandidatePhoneMother;
use Tests\TestCase;

class EloquentCandidateRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private null|Request $request;
    private null|CandidateCreateRequestValidation $createRequestValidation;
    private null|CandidateSearchByIdRequestValidation $searchByIdRequestValidation;
    private null|CandidateDeleteByIdRequestValidation $deleteByIdRequestValidation;
    private null|EloquentCandidateRepository $repository;
    private string $staticUuid;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->request = null;
        $this->createRequestValidation = null;
        $this->searchByIdRequestValidation = null;
        $this->repository = null;
        $this->staticUuid = '49424436-4f25-11ed-bdc3-0242ac120002';
    }

    /** @test */
    public function it_should_save_ten_random_candidates(): void
    {
        $this->initializeVariables();

        $this->assertEquals(0, $this->repository->count());

        for ($x = 1; $x <= 10; $x++) {
            $this->request->replace([
                'id' => CandidateIdMother::random(),
                'first_name' => CandidateFirstNameMother::random(),
                'last_name' => CandidateLastNameMother::random(),
                'email' => CandidateEmailMother::random(),
                'phone' => CandidatePhoneMother::random(),
            ]);
            $validation = Validator::make($this->request->all(), $this->createRequestValidation->rules());
            $this->assertFalse($validation->fails());

            $candidate = CandidateMother::fromRequest($this->request);

            $this->repository->create($candidate);
        }

        $this->assertEquals(10, $this->repository->count());
    }

    /** @test */
    public function it_should_create_specific_uuid_candidate_then_verify_searching_uuid(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            'first_name' => CandidateFirstNameMother::random(),
            'last_name' => CandidateLastNameMother::random(),
            'email' => CandidateEmailMother::random(),
            'phone' => CandidatePhoneMother::random(),
        ]);

        $validation = Validator::make($this->request->all(), $this->createRequestValidation->rules());
        $this->assertFalse($validation->fails());

        $this->assertEquals(0, $this->repository->count());
        $candidate = CandidateMother::fromRequest($this->request);
        $this->repository->create($candidate);

        $this->assertEquals(1, $this->repository->count());

        // Search
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
        ]);

        $validation = Validator::make($this->request->all(), $this->searchByIdRequestValidation->rules());

        $this->assertFalse($validation->fails());

        $results = $this->repository->searchById(new CandidateId($this->staticUuid));

        $this->assertEquals($this->staticUuid, $results->id);
    }

    /** @test */
    public function it_should_create_specific_uuid_candidate_then_delete_by_uuid(): void
    {
        // Create
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            'first_name' => CandidateFirstNameMother::random(),
            'last_name' => CandidateLastNameMother::random(),
            'email' => CandidateEmailMother::random(),
            'phone' => CandidatePhoneMother::random(),
        ]);

        $validation = Validator::make($this->request->all(), $this->createRequestValidation->rules());

        $this->assertFalse($validation->fails());
        $this->assertEquals(0, $this->repository->count());

        $candidate = CandidateMother::fromRequest($this->request);

        $this->repository->create($candidate);

        $this->assertEquals(1, $this->repository->count());

        // Search
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
        ]);

        $validation = Validator::make($this->request->all(), $this->searchByIdRequestValidation->rules());

        $this->assertFalse($validation->fails());

        $results = $this->repository->searchById(new CandidateId($this->staticUuid));

        $this->assertEquals($this->staticUuid, $results->id);


        // Delete
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
        ]);

        $validation = Validator::make($this->request->all(), $this->deleteByIdRequestValidation->rules());

        $this->assertFalse($validation->fails());

        $this->repository->deleteById(new CandidateId($this->staticUuid));

        $this->assertEquals(0, $this->repository->count());
    }

    /** @test */
    public function it_should_fail_create_because_missing_params(): void
    {
        $this->initializeVariables();

        $this->request->replace([
            'id' => $this->staticUuid,
            'last_name' => CandidateLastNameMother::random(),
            'email' => CandidateEmailMother::random(),
            'phone' => CandidatePhoneMother::random(),
        ]);

        $validation = Validator::make($this->request->all(), $this->createRequestValidation->rules());

        $this->assertTrue($validation->fails());

        $this->assertEquals(0, $this->repository->count());
    }

    private function initializeVariables()
    {
        $this->request = new Request();
        $this->createRequestValidation = new CandidateCreateRequestValidation();
        $this->searchByIdRequestValidation = new CandidateSearchByIdRequestValidation();
        $this->deleteByIdRequestValidation = new CandidateDeleteByIdRequestValidation();
        $this->repository = new EloquentCandidateRepository();
    }
}
