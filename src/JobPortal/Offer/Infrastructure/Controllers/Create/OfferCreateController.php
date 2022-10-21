<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Create;

use Src\JobPortal\Offer\Application\Create\OfferCreateRequest;
use Src\JobPortal\Offer\Application\Create\OfferCreateUseCase;
use \Illuminate\Http\Response;

final class OfferCreateController
{
    private OfferCreateUseCase $useCase;

    public function __construct(OfferCreateUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(OfferCreateRequestValidation $request): Response
    {
        $request = new OfferCreateRequest($request);

        return $this->useCase->__invoke($request);
    }
}
