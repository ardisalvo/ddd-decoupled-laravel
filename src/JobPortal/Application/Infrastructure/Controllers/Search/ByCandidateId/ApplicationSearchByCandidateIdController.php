<?php

namespace Src\JobPortal\Application\Infrastructure\Controllers\Search\ByCandidateId;

use Illuminate\Http\Response;
use Src\JobPortal\_Shared\Domain\Candidate\ValueObjects\CandidateId;
use Src\JobPortal\Application\Application\Search\ApplicationSearchByCandidateIdUseCase;

final class ApplicationSearchByCandidateIdController
{
    private ApplicationSearchByCandidateIdUseCase $useCase;

    public function __construct(ApplicationSearchByCandidateIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(ApplicationSearchByCandidateIdRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CandidateId($request->get('candidate_id')));
    }
}
