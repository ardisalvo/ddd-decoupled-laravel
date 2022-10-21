<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Create;

use Illuminate\Http\Response;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;

final class CandidateCreateController
{
    private CandidateCreateUseCase $useCase;

    public function __construct(CandidateCreateUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(CandidateCreateRequestValidation $request): Response
    {
        $request = new CandidateCreateRequest($request);

        return $this->useCase->__invoke($request);
    }
}
