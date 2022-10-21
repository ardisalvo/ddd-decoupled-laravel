<?php

namespace Src\JobPortal\Offer\Application\Delete;

use Src\JobPortal\Offer\Domain\Exceptions\OfferException;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferId;
use \Illuminate\Http\Response;

class OfferDeleteByIdUseCase
{
    private OfferRepositoryContract $repository;

    public function __construct(OfferRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OfferId $id): Response
    {
        $response = $this->repository->deleteById($id);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer deleted',
            'data' => $id->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new OfferException("The offer could not be deleted. Please verify that the ID is correct and that the offer exists.",
            500);
    }
}
