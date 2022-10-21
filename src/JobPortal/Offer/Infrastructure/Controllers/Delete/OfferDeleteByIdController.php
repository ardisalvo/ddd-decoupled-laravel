<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Delete;

use Src\JobPortal\Offer\Application\Delete\OfferDeleteByIdUseCase;
use Src\JobPortal\Offer\Domain\ValueObjects\OfferId;
use \Illuminate\Http\Response;

final class OfferDeleteByIdController
{

    private OfferDeleteByIdUseCase $useCase;

    public function __construct(OfferDeleteByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(OfferDeleteByIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new OfferId($request->get('id')));
    }
}
