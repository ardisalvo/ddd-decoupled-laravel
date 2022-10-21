<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\All;

use Illuminate\Http\Response;
use Src\JobPortal\Offer\Application\Search\OfferSearchAllUseCase;

final class OfferSearchAllController
{
    private OfferSearchAllUseCase $useCase;

    public function __construct(OfferSearchAllUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(): Response
    {
        return $this->useCase->__invoke();
    }
}
