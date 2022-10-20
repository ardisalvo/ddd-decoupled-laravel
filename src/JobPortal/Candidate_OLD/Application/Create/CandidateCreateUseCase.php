<?php

namespace Src\JobPortal\Candidate\Application\Create;

use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\Exceptions\CompanyException;
use Src\JobPortal\Candidate\Domain\Requests\Create\CandidateCreateRequest;

class CandidateCreateUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $candidateRepositoryContract)
    {
        $this->repository = $candidateRepositoryContract;
    }

    public function __invoke(array $request, string $date): array
    {

        $response = $this->repository->create(new CandidateCreateRequest($request, $date));

        if (!$response) {
            $this->exception();
        }

        return [
            'message' => 'Candidate successfully created.',
            'id' => $response,
        ];
    }

    private function exception()
    {
        throw new CompanyException("Candidate cant be created", 500);
    }
}
