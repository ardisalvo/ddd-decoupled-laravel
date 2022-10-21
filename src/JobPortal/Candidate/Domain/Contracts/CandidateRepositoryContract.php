<?php

namespace Src\JobPortal\Candidate\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\Candidate\Domain\Candidate;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent\EloquentCandidateModel;

interface CandidateRepositoryContract
{
    public function create(Candidate $candidate): CandidateId|null;

    public function searchById(CandidateId $id): ?EloquentCandidateModel;

    public function searchByEmail(CandidateEmail $name): ?EloquentCandidateModel;

    public function deleteById(CandidateId $id): int;

    public function count(): int;

    public function getAll(): ?Collection;
}
