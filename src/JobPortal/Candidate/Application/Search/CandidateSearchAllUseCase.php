<?php

namespace Src\JobPortal\Candidate\Application\Search;

use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use \Illuminate\Http\Response;

class CandidateSearchAllUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Response
    {
        $response = $this->repository->getAll();

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'List of candidates:',
            'data' => $response,
        ], 200);
    }

    private function exception(): void
    {
        throw new CandidateException("There are no candidates in the database.", 500);
    }
}
