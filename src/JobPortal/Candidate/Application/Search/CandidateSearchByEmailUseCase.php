<?php

namespace Src\JobPortal\Candidate\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\Exceptions\CandidateException;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;

class CandidateSearchByEmailUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CandidateEmail $email): Response
    {
        $response = $this->repository->searchByEmail($email);

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
        throw new CandidateException("There are no candidate in the database.", 500);
    }
}
