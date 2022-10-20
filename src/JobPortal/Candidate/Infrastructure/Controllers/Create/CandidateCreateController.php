<?php

namespace Src\JobPortal\Candidate\Infrastructure\Controllers\Create;

use Src\JobPortal\Candidate\Application\Create\CandidateCreateRequest;
use Src\JobPortal\Candidate\Application\Create\CandidateCreateUseCase;
use \Illuminate\Http\Response;

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
