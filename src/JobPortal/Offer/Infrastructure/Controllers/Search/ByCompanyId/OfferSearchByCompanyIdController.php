<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\ByCompanyId;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Offer\Application\Search\OfferSearchByCompanyIdUseCase;

final class OfferSearchByCompanyIdController
{
    private OfferSearchByCompanyIdUseCase $useCase;

    public function __construct(OfferSearchByCompanyIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(OfferSearchByCompanyIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CompanyId($request->get('company_id')));
    }
}
