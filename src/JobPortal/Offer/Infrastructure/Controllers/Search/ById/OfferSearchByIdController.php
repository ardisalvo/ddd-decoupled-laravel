<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\ById;

use Src\JobPortal\Offer\Application\Search\OfferSearchByIdUseCase;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferId;
use \Illuminate\Http\Response;

final class OfferSearchByIdController
{

    private OfferSearchByIdUseCase $useCase;

    public function __construct(OfferSearchByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(OfferSearchByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new OfferId($request->get('id')));
    }
}
