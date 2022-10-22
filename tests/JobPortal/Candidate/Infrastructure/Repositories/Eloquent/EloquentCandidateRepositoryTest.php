<?php

namespace Tests\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Create\CandidateCreateRequestValidation;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Delete\CandidateDeleteByIdRequestValidation;
use Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ById\CandidateSearchByIdRequestValidation;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\EloquentCandidateRepository;
use Tests\JobPortal\Candidate\Application\Domain\CandidateMother;
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
    public function it_should_save_a_random_candidate_without_validate(): void
    {
        $this->initializeVariables();

        $this->assertEquals(0, $this->repository->count());

        $candidate = CandidateMother::random();

        $this->repository->create($candidate);

        $this->assertEquals(1, $this->repository->count());
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
