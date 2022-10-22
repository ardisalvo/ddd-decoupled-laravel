<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\ById;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Application\Search\OfferSearchByIdUseCase;

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
