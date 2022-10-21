<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\All;

use Illuminate\Http\Response;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchAllUseCase;

final class CandidateSearchAllController
{
    private CandidateSearchAllUseCase $useCase;

    public function __construct(CandidateSearchAllUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(): Response
    {
        return $this->useCase->__invoke();
    }
}
