<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ByEmail;

use Illuminate\Http\Response;
use Src\JobPortal\Candidate\Application\Search\CandidateSearchByEmailUseCase;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;

final class CandidateSearchByEmailController
{
    private CandidateSearchByEmailUseCase $useCase;

    public function __construct(CandidateSearchByEmailUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CandidateSearchByEmailRequestValidation $request): Response
    {
        return $this->useCase->__invoke(new CandidateEmail($request->get('name')));
    }
}
