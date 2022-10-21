<?php

namespace Src\JobPortal\Offer\Infrastructure\Controllers\Search\ByCompanyId;

use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\Offer\Application\Search\OfferSearchByCompanyIdUseCase;
use \Illuminate\Http\Response;

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
