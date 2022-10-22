<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Delete;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Offer\Application\Delete\OfferDeleteByIdUseCase;

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
