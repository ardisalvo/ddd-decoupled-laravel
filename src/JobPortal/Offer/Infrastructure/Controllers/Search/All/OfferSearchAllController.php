<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\All;

use Src\JobPortal\Offer\Application\Search\OfferSearchAllUseCase;
use \Illuminate\Http\Response;

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
