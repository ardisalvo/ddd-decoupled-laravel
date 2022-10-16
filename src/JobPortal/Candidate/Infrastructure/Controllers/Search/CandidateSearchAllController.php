<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search;

use Src\JobPortal\Candidate\Application\Search\CandidateSearchAllUseCase;

final class CandidateSearchAllController
{
    /**
     * @var CandidateSearchAllUseCase
     */
    private $searchAllUseCase;

    /**
     * @param  CandidateSearchAllUseCase  $searchAllUseCase
     */
    public function __construct(CandidateSearchAllUseCase $searchAllUseCase)
    {
        $this->searchAllUseCase = $searchAllUseCase;
    }

    /**
     * @return array
     */
    public function __invoke(): array
    {
        return $this->searchAllUseCase->__invoke();
    }
}
