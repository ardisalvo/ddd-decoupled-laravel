<?php

namespace Src\JobPortal\Offer\Application\Search;

use Src\JobPortal\Offer\Domain\Exceptions\OfferException;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use \Illuminate\Http\Response;

class OfferSearchAllUseCase
{
    private OfferRepositoryContract $repository;

    public function __construct(OfferRepositoryContract $repository)
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
            'message' => 'List of offers:',
            'data' => $response,
        ], 200);
    }

    private function exception(): void
    {
        throw new OfferException("There are no offers in the database.", 500);
    }
}
