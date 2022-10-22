<?php

namespace Src\JobPortal\Application\Application\Search;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Application\Domain\Contracts\ApplicationRepositoryContract;
use Src\JobPortal\Application\Domain\Exceptions\ApplicationException;

class ApplicationSearchByOfferIdUseCase
{
    private ApplicationRepositoryContract $repository;

    public function __construct(ApplicationRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OfferId $offerId): Response
    {
        $response = $this->repository->searchByOfferId($offerId);

        if (! $response) {
            $this->exception();
        }

        return response([
            'message' => 'Applications found:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception(): void
    {
        throw new ApplicationException("There are no applications in the database.", 500);
    }
}
