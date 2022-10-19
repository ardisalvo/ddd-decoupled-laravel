<?php

namespace Src\JobPortal\Candidate\Application\Update;

use Src\JobPortal\Candidate\Domain\Contracts\CandidateRepositoryContract;
use Src\JobPortal\Candidate\Domain\Exceptions\CompanyException;
use Src\JobPortal\Candidate\Domain\Requests\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Domain\Requests\Update\CandidateUpdateRequest;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateId;
use Src\JobPortal\Candidate\Infrastructure\RequestValidations\CandidateUpdateRequestValidation;

class CandidateUpdateUseCase
{
    private CandidateRepositoryContract $repository;

    public function __construct(CandidateRepositoryContract $candidateRepositoryContract)
    {
        $this->repository = $candidateRepositoryContract;
    }

    public function __invoke(CandidateUpdateRequestValidation $request, string $date): array
    {
        $candidateId = new CandidateId($request['candidate_id']);

        $response = $this->repository->update(
            $candidateId,
            new CandidateUpdateRequest(
                $request->except('candidate_id'),
                $date
            )
        );

        if (!$response) {
            $this->exception();
        }

        return [
            'message' => 'Candidate successfully updated.',
            'id' => $response,
        ];
    }

    private function exception()
    {
        throw new CompanyException("Candidate cant be updated", 500);
    }
}
