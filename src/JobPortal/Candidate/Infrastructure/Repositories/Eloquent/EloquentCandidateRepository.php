<?php

namespace Src\JobPortal\Candidate\Infrastructure\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Domain\Candidate;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;

class EloquentCandidateRepository implements CandidateRepositoryContract
{
    public function create(Candidate $candidate): CandidateId|null
    {
        $result = EloquentCandidateModel::create([
            'id' => $candidate->id()->value(),
            'first_name' => $candidate->firstName()->value(),
            'last_name' => $candidate->lastName()->value(),
            'email' => $candidate->email()->value(),
            'phone' => $candidate->phone()->value(),
        ]);

        if ($result) {
            return new CandidateId($result->id);
        }

        return null;
    }

    public function searchById(CandidateId $id): ?EloquentCandidateModel
    {
        return EloquentCandidateModel::where('id', $id)->first();
    }

    public function count(): int
    {
        return EloquentCandidateModel::count();
    }

    public function getAll(): ?Collection
    {
        return EloquentCandidateModel::orderBy('created_at', 'DESC')->get();
    }

    public function searchByEmail(CandidateEmail $name): ?EloquentCandidateModel
    {
        return EloquentCandidateModel::where('email', $name)->first();
    }

    public function deleteById(CandidateId $id): int
    {
        return EloquentCandidateModel::where('id', $id)->delete();
    }
}
