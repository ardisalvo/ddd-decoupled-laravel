<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\All;

use Src\JobPortal\Candidate\Application\Search\CandidateSearchAllUseCase;
use \Illuminate\Http\Response;

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
