<?php

namespace Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
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
}
