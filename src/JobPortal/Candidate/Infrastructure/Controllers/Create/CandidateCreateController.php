<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Create;

use Illuminate\Http\Response;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use Src\JobPortal\Candidate\Domain\Candidate;

final class CandidateCreateController
{
    private CandidateCreateUseCase $useCase;

    public function __construct(CandidateCreateUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CandidateCreateRequestValidation $request): Response
    {
        $candidate = new Candidate(
            $request->get('id'),
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email'),
            $request->get('phone')
        );

        return $this->useCase->__invoke($candidate);
    }
}
