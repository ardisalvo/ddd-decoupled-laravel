<?php

namespace Src\JobPortal\Application\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationSearchByCandidateIdUseCase
{
    private ApplicationRepositoryContract $repository;

    public function __construct(ApplicationRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CandidateId $candidateId): Response
    {
        $response = $this->repository->searchByCandidateId($candidateId);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer found:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception(): void
    {
        throw new ApplicationException("There are no offer in the database.", 500);
    }
}
