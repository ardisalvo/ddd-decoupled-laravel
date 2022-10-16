<?php

namespace Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\Requests\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\ValueObjects\GroupedObjects\CandidateStoreRequest;

final class CandidateRepository implements CandidateRepositoryContract
{
    private $model;

    public function __construct()
    {
        $this->model = new Candidate();
    }

    public function findAll(): array
    {
        return $this->model->all()->toArray();
    }

    public function deleteById(CandidateId $candidateId): bool
    {
        return $this->model->where('id', $candidateId->value())->delete();
    }

    public function create(CandidateCreateRequest $candidateCreateRequest): ?int
    {
        $response = $this->model->create($candidateCreateRequest->handler());

        return ($response) ? $response->id : null;
    }
}
