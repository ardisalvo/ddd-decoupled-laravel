<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Search\ByEmail;

use Src\JobPortal\Candidate\Application\Search\CandidateSearchByEmailUseCase;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateEmail;
use Src\JobPortal\Candidate\Domain\ValueObjects\CandidateFirstName;
use \Illuminate\Http\Response;

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
