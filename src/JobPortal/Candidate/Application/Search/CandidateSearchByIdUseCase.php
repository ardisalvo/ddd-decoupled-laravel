<?php

namespace Src\JobPortal\Candidate\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;

class CandidateSearchByIdUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CandidateId $id): Response
    {
        $response = $this->repository->searchById($id);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Candidate found:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception(): void
    {
        throw new CandidateException("There are no candidates in the database.", 500);
    }
}
