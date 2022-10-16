<?php

namespace Src\JobPortal\Candidate\Domain\Contracts;

use Src\JobPortal\Candidate\Domain\Requests\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;

interface CandidateRepositoryContract
{
    public function findAll(): array;

    public function deleteById(CandidateId $candidateId): bool;

    public function create(CandidateCreateRequest $candidateCreateRequest): ?int;
}
