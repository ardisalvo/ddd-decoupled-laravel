<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Search\ByOfferId;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\_Shared\Domain\Company\ValueObjects\CompanyId;
use Src\JobPortal\_Shared\Domain\Offer\ValueObjects\OfferId;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByCandidateIdUseCase;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByOfferIdUseCase;

final class ApplicationSearchByOfferIdController
{
    private ApplicationSearchByOfferIdUseCase $useCase;

    public function __construct(ApplicationSearchByOfferIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(ApplicationSearchByOfferIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new OfferId($request->get('offer_id')));
    }
}
