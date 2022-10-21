<?php

namespace Src\JobPortal\Offer\Application\Search;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Offer\Domain\Exceptions\OfferException;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferTitle;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferDescription;
use \Illuminate\Http\Response;

class OfferSearchByCompanyIdUseCase
{
    private OfferRepositoryContract $repository;

    public function __construct(OfferRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CompanyId $companyId): Response
    {
        $response = $this->repository->searchByCompanyId($companyId);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer found:',
            'data' => $response->toArray(),
        ], 200);
    }

    private function exception(): void
    {
        throw new OfferException("There are no offer in the database.", 500);
    }
}
