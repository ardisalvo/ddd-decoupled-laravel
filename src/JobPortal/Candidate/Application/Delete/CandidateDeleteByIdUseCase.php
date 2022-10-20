<?php

namespace Src\JobPortal\Candidate\Application\Delete;

use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use \Illuminate\Http\Response;

class CandidateDeleteByIdUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CandidateId $id): Response
    {
        $response = $this->repository->deleteById($id);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'Candidate deleted',
            'data' => $id->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new CandidateException("The candidate could not be deleted. Please verify that the ID is correct and that the candidate exists.",
            500);
    }
}
