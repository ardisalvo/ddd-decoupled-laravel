<?php

namespace Src\JobPortal\Offer\Application\Search;

use Src\JobPortal\Offer\Domain\Exceptions\OfferException;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferId;
use \Illuminate\Http\Response;

class OfferSearchByIdUseCase
{
    private OfferRepositoryContract $repository;

    public function __construct(OfferRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OfferId $id): Response
    {
        $response = $this->repository->searchById($id);

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
        throw new OfferException("There are no offers in the database.", 500);
    }
}
