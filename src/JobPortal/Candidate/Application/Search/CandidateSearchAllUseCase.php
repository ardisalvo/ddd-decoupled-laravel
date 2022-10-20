<?php

namespace Src\JobPortal\Candidate\Application\Search;

use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Company\Domain\Exceptions\CompanyException;

final class CandidateSearchAllUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $candidateRepositoryContract)
    {
        $this->repository = $candidateRepositoryContract;
    }

    public function __invoke(): array
    {
        $response = $this->repository->findAll();

        if (!$response) {
            $this->exception();
        }

        return [
            'message' => 'List of candidates:',
            'candidate_data' => $response,
        ];
    }

    private function exception()
    {
        throw new CompanyException("There are no candidates in the database.", 500);
    }
}
