<?php

namespace Src\JobPortal\Offer\Application\Create;

use Src\JobPortal\Offer\Domain\Exceptions\OfferException;
use Src\JobPortal\Offer\Domain\Offer;
use Src\JobPortal\Offer\Domain\Contracts\OfferRepositoryContract;
use Illuminate\Http\Response;

class OfferCreateUseCase
{
    private OfferRepositoryContract $repository;

    public function __construct(OfferRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(OfferCreateRequest $request): Response
    {

        $offer = new Offer(
            $request->id(),
            $request->title(),
            $request->description(),
            $request->companyId(),
            $request->status(),
        );

        $response = $this->repository->create($offer);

        if (!$response) {
            $this->exception();
        }

        return response([
            'message' => 'Offer successfully created.',
            'id' => $response->value(),
        ], 200);
    }

    private function exception(): void
    {
        throw new OfferException("Offer cant be created", 500);
    }
}
