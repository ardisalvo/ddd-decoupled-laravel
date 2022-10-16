<?php

namespace Src\JobPortal\Candidate\Application\Delete;

use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;

final class CandidateDeleteByIdUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $candidateRepositoryContract)
    {
        $this->repository = $candidateRepositoryContract;
    }

    public function __invoke(CandidateId $candidateId): array
    {
        $response = $this->repository->deleteById($candidateId);

        if (!$response) {
            $this->exception();
        }

        return [
            'message' => 'Candidate deleted',
            'candidate_data' => $candidateId,
        ];
    }

    private function exception()
    {
        throw new CandidateException("The candidate cannot be deleted, please check if it exists or if the ID is correct.",
            500);
    }
}
